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
     * Method untuk menambahkan data lowongan pekerjaan.
     *
     * @param array $data
     * @return Vacancy
     */
    public function createVacancy(array $data)
    {
        // Encode field JSON sebelum menyimpan ke database
        $data['job_description'] = json_encode($data['job_description']);
        $data['qualifications'] = json_encode($data['qualifications']);

        // Menggunakan model untuk menyimpan data
        return $this->vacancyModel->create($data);
    }

    public function getAllVacancies()
    {

        $vacancies = Vacancy::all()->map(function ($item) {
            if (Carbon::parse($item->closing_date)->isPast() && $item->status != 'closed') {
                $item->status = 'closed';
                $item->save();
            }

            $item->job_description = str_replace(['[', ']', '"'], '', $item->job_description);
            $item->job_description = explode(',', $item->job_description);
            $item->job_description = array_map('trim', $item->job_description);

            // Proses qualifications
            $item->qualifications = str_replace(['[', ']', '"'], '', $item->qualifications);
            $item->qualifications = explode(',', $item->qualifications);
            $item->qualifications = array_map('trim', $item->qualifications);

            return $item;
        });

        return $vacancies;
    }
}
