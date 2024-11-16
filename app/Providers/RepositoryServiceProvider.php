<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Employe\EmployeInterface;
use App\Repositories\Manajer\ManajerInterface;
use App\Repositories\Vacancy\VacancyInterface;
use App\Repositories\Employe\EmployeRepository;
use App\Repositories\Manajer\ManajerRepository;
use App\Repositories\Vacancy\VacancyRepository;

class RepositoryServiceProvider extends ServiceProvider {


    public function register() {
        $this->app->bind(ManajerInterface::class, ManajerRepository::class);
        $this->app->bind(EmployeInterface::class, EmployeRepository::class);
        $this->app->bind(VacancyInterface::class, VacancyRepository::class);

    }
}
