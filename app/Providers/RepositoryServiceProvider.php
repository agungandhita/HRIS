<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Loker\LokerInterface;
use App\Repositories\Loker\LokerRepository;
use App\Repositories\Lamaran\LamaranInterface;
use App\Repositories\Manajer\ManajerInterface;
use App\Repositories\Vacancy\VacancyInterface;
use App\Repositories\Lamaran\LamaranRepository;
use App\Repositories\Manajer\ManajerRepository;
use App\Repositories\Vacancy\VacancyRepository;
use App\Repositories\Application\JobApplicationInterface;
use App\Repositories\Application\JobApplicationRepository;
use App\Repositories\Pegawai\PegawaiInterface;
use App\Repositories\Pegawai\PegawaiRepository;

class RepositoryServiceProvider extends ServiceProvider {


    public function register() {
        $this->app->bind(ManajerInterface::class, ManajerRepository::class);
        $this->app->bind(VacancyInterface::class, VacancyRepository::class);
        $this->app->bind(LokerInterface::class, LokerRepository::class);
        $this->app->bind(LamaranInterface::class, LamaranRepository::class);
        $this->app->bind(JobApplicationInterface::class, JobApplicationRepository::class);
        $this->app->bind(PegawaiInterface::class, PegawaiRepository::class);
    }
}
