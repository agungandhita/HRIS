<?php

namespace App\Http\Controllers\page;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeRequest;
use App\Repositories\Loker\LokerInterface;
use App\Repositories\Application\JobApplicationInterface;

class FrontController extends Controller
{

    private $LokerRepository;
    private $JobApplicationRepository;


    public function __construct(LokerInterface $LokerRepository, JobApplicationInterface $JobApplicationRepository)
    {
        $this->LokerRepository = $LokerRepository;
        $this->JobApplicationRepository = $JobApplicationRepository;
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

        return view('rekrutmen.page.apply', ['loker' => $loker]);
    }


    public function apply(StoreEmployeRequest $request, $id)
    {

    }

}
