<?php

namespace App\Repositories\Application;

use App\Models\Employe;
use App\Models\Vacancy;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JobApplicationRepositroty implements JobApplicationInterface
{

    private $jobApplicationModel;

    public function __construct(JobApplication $jobApplication)
    {
        $this->jobApplicationModel = $jobApplication;
    }


 /**
     * Mengajukan lamaran kerja untuk suatu vacancy.
     *
     * @param array $data
     * @return bool
     */
    public function applyForJob(array $data): bool
    {
        $vacancy = Vacancy::findOrFail($data['vacancy_id']);

        $employe = new Employe();
        $employe->fill($data);
        $employe->vacancy_id = $vacancy->vacancy_id;
        $employe->save();

        return true;
    }

}
