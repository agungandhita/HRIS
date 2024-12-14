<?php

namespace App\Repositories\Loker;

use App\Models\Vacancy;

interface LokerInterface
{
    public function showAll();

    public function getById(Vacancy $id);

}
