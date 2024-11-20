<?php

namespace App\Repositories\Application;

interface JobApplicationInterface {


    public function applyForJob(array $data): bool;

}
