<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Loker\LokerInterface;
use App\Repositories\Loker\LokerRepository;
use App\Repositories\Lamaran\LamaranInterface;
use App\Repositories\Manajer\ManajerInterface;
use App\Repositories\Pegawai\PegawaiInterface;
use App\Repositories\Vacancy\VacancyInterface;
use App\Repositories\Lamaran\LamaranRepository;
use App\Repositories\Manajer\ManajerRepository;
use App\Repositories\Pegawai\PegawaiRepository;
use App\Repositories\Vacancy\VacancyRepository;
use App\Repositories\Pengajuan\PengajuanInterface;
use App\Repositories\Pengajuan\PengajuanRepository;
use App\Repositories\penggajian\PenggajianInterface;
use App\Repositories\penggajian\PenggajianRepository;
use App\Repositories\Application\JobApplicationInterface;
use App\Repositories\Application\JobApplicationRepository;

class RepositoryServiceProvider extends ServiceProvider {


    public function register() {
        $this->app->bind(ManajerInterface::class, ManajerRepository::class);
        $this->app->bind(VacancyInterface::class, VacancyRepository::class);
        $this->app->bind(LokerInterface::class, LokerRepository::class);
        $this->app->bind(LamaranInterface::class, LamaranRepository::class);
        $this->app->bind(JobApplicationInterface::class, JobApplicationRepository::class);
        $this->app->bind(PegawaiInterface::class, PegawaiRepository::class);
        $this->app->bind(PengajuanInterface::class, PengajuanRepository::class);
        $this->app->bind(PenggajianInterface::class, PenggajianRepository::class);
    }
}
