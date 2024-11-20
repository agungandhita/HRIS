<?php

namespace App\Repositories\Application;

use App\Models\Employe;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;

class JobApplicationRepositroty implements JobApplicationInterface {

    private $jobApplicationModel;

    public function __construct(JobApplication $jobApplication)
    {
        $this->jobApplicationModel = $jobApplication;
    }

    public function applyForJob(array $data): bool
    {
        DB::beginTransaction();

        try {
            $employe = Employe::create($data['employe']);

            JobApplication::create([
                'vacancy_id' => $data['vacancy_id'],
                'employe_id' => $employe->employe_id,
                'status' => 'applied',
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

}
