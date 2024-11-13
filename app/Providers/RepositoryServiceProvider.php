<?php 

namespace App\Providers;

use App\Repositories\Employe\EmployeInterface;
use App\Repositories\Employe\EmployeRepository;
use App\Repositories\Manajer\ManajerInterface;
use App\Repositories\Manajer\ManajerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {


    public function register() {
        $this->app->bind(ManajerInterface::class, ManajerRepository::class);
        $this->app->bind(EmployeInterface::class, EmployeRepository::class);

    }
}