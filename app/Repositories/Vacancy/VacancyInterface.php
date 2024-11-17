<?php

namespace App\Repositories\Vacancy;

interface VacancyInterface
{
    /**
     * Method untuk menambahkan data lowongan pekerjaan.
     *
     * @param array $data
     * @return mixed
     */
    public function createVacancy(array $data);

    public function getAllVacancies();

    public function updateVacancies(int $id, array $data);

}
