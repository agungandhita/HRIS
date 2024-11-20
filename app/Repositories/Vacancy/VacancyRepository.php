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
            // Proses job_description
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

    public function updateVacancies(int $id, array $data)
    {

        $vacancy = Vacancy::findOrFail($id);

        // Menghilangkan karakter [ ] dan memisahkan berdasarkan tanda kutip
        $jobDescription = preg_replace('/\[|\]/', '', $data['job_description']);
        $qualifications = preg_replace('/\[|\]/', '', $data['qualifications']);

        // Mengubah menjadi array berdasarkan tanda kutip
        $jobDescriptionArray = array_map('trim', explode('","', trim($jobDescription, '"')));
        $qualificationsArray = array_map('trim', explode('","', trim($qualifications, '"')));

        // Encode kembali menjadi JSON
        $vacancy->job_description = json_encode($jobDescriptionArray);
        $vacancy->qualifications = json_encode($qualificationsArray);

        // Simpan perubahan
        $vacancy->save();

        return $vacancy;
    }

    public function getBySlug(string $slug) {

        return Vacancy::where('slug', $slug)->firstOrFail();
    }
}
