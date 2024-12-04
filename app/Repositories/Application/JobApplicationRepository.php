<?php

namespace App\Repositories\Application;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Log;

class JobApplicationRepository implements JobApplicationInterface
{

    private $jobApplicationModel;

    public function __construct(JobApplication $jobApplication)
    {
        $this->jobApplicationModel = $jobApplication;
    }


    public function createApplication(array $data)
    {
        try {
            $application = JobApplication::create($data);
            Log::info('Job application created successfully', ['application_id' => $application->application_id]);
            return $application;
        } catch (\Exception $e) {
            Log::error('Error creating job application: ' . $e->getMessage());
            throw $e;
        }
    }
}
