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

    // public function getBySlug(string $slug);

    public function updateVacancies(int $id, array $data, int $userId);

    public function delete(int $id, int $userId);

}
