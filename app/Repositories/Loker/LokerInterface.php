<?php

namespace App\Repositories\Loker;


interface LokerInterface
{
    public function showAll();

    public function getBySlug(string $slug);

}
