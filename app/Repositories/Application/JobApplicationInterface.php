<?php

namespace App\Repositories\Application;

interface JobApplicationInterface
{
    public function createApplication(array $data);
    // public function updateApplicationStatus(int $id, int $userId);
}
