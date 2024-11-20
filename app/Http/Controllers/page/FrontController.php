<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Repositories\Loker\LokerInterface;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    private $LokerRepository;


    public function __construct(LokerInterface $LokerRepository)
    {
        $this->LokerRepository = $LokerRepository;
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


    public function detail(string $slug) {

        $loker = $this->LokerRepository->getBySlug($slug);

        return view('rekrutmen.page.detail', compact('loker'));
    }
}
