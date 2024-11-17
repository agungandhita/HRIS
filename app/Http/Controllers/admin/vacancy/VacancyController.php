<?php

namespace App\Http\Controllers\admin\vacancy;

use App\Models\Vacancy;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVacancyRequest;
use App\Repositories\Vacancy\VacancyInterface;
use Illuminate\Http\Request;

class VacancyController extends Controller
{

    private $vacancyRepository;

    public function __construct(VacancyInterface $vacancyRepository)
    {

        $this->vacancyRepository = $vacancyRepository;
    }

    public function index()
    {
        $data = $this->vacancyRepository->getAllVacancies();

        return view('admin.loker.index', [
            'data' => $data,
        ]);
    }

    public function add()
    {
        return view('admin.loker.add');
    }


    public function store(StoreVacancyRequest $request, VacancyInterface $vacancyRepository)
    {

        $data = $request->validated();

        $data['user_created'] = auth()->id();

        $vacancy = $vacancyRepository->createVacancy($data);

        return redirect()->route('vacancy.index')->with('success', 'suskes menambah loker');
    }
}
