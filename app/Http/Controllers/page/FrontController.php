<?php

namespace App\Http\Controllers\page;

use Exception;
use App\Models\Vacancy;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\Loker\LokerInterface;
use App\Repositories\Vacancy\VacancyInterface;
use App\Http\Requests\StoreLamaranRequest;
use App\Repositories\Application\JobApplicationInterface;
use App\Repositories\Lamaran\LamaranRepository;

class FrontController extends Controller
{

    private $LokerRepository;
    private $JobApplicationRepository;
    private $VacancyRepository;
    private $LamaranRepository;



    public function __construct(LokerInterface $LokerRepository, LamaranRepository $lamaranRepository, JobApplicationInterface $JobApplicationRepository,  VacancyInterface $vacancyRepository,)
    {
        $this->LokerRepository = $LokerRepository;
        $this->JobApplicationRepository = $JobApplicationRepository;
        $this->VacancyRepository = $vacancyRepository;
        $this->LamaranRepository = $lamaranRepository;
    }

    public function index()
    {
        return view('rekrutmen.page.home');
    }

    public function career()
    {
        $loker = $this->LokerRepository->showAll();

        // dd($loker);

        return view('rekrutmen.page.career', [
            'data' => $loker
        ]);
    }


    public function detail(string $slug)
    {

        $loker = $this->LokerRepository->getBySlug($slug);

        $other = $this->LokerRepository->showAll();

        return view('rekrutmen.page.detail', [
            'loker' => $loker,
            'list' => $other
        ]);
    }

    public function applyForm(string $slug)
    {
        $loker = $this->LokerRepository->getBySlug($slug);

        return view('rekrutmen.page.apply', [

            'loker' => $loker,
        ]);
    }

}
