<?php

namespace App\Repositories\Vacancy;

use App\Models\Vacancy;

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

}
