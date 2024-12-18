<?php

namespace App\Repositories\Vacancy;

use App\Models\Vacancy;
use Carbon\Carbon;

class VacancyRepository implements VacancyInterface
{

    private $vacancyModel;

    public function __construct(Vacancy $vacancy)
    {
        $this->vacancyModel = $vacancy;
    }

    /**
     * menambahkan data lowongan pekerjaan.
     *
     * @param array $data
     * @return Vacancy
     */
    public function createVacancy(array $data)
    {
        $data['job_description'] = json_encode($data['job_description']);
        $data['qualifications'] = json_encode($data['qualifications']);

        return $this->vacancyModel->create($data);
    }

    public function getAllVacancies($filters = [])
    {

        $vacancies = Vacancy::all()->map(function ($item) {
            if (Carbon::parse($item->closing_date)->isPast() && $item->status != 'closed') {
                $item->status = 'closed';
                $item->save();
            }
            $item->job_description = str_replace(['[', ']', '"'], '', $item->job_description);
            $item->job_description = explode(',', $item->job_description);
            $item->job_description = array_map('trim', $item->job_description);

            $item->qualifications = str_replace(['[', ']', '"'], '', $item->qualifications);
            $item->qualifications = explode(',', $item->qualifications);
            $item->qualifications = array_map('trim', $item->qualifications);

            return $item;
        });

        return $vacancies;
    }

    public function updateVacancies(int $id, array $data, int $userId)
    {

        $vacancy = Vacancy::findOrFail($id);

        $vacancy->posting_date = $data['posting_date'];
        $vacancy->closing_date = $data['closing_date'];

        $vacancy->user_updated = $userId;

        if (Carbon::now()->greaterThan(Carbon::parse($vacancy->closing_date))) {
            $vacancy->status = 'closed';
        } else {
            $vacancy->status = 'open';
        }

        $vacancy->updated_at = Carbon::now('Asia/Jakarta');

        $vacancy->save();

        return $vacancy;
    }

    // public function getBySlug(string $slug) {

    //     return Vacancy::where('slug', $slug)->firstOrFail();
    // }


    public function delete(int $id, int $userId ) {
        $vacancy = Vacancy::findOrFail($id);

        $vacancy->user_deleted = $userId;
        $vacancy->deleted = true;
        $vacancy->deleted_at = Carbon::now('Asia/Jakarta');

        return $vacancy->save();
    }
}
