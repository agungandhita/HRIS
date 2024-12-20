<?php

namespace App\Http\Controllers\admin\vacancy;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Repositories\Vacancy\VacancyInterface;

class VacancyController extends Controller
{

    private $vacancyRepository;

    public function __construct(VacancyInterface $vacancyRepository)
    {

        $this->vacancyRepository = $vacancyRepository;
    }

    public function index(Request $request)
    {
        $data = Vacancy::query()
        ->when($request->filled('title'), function ($query) use ($request) {
            return $query->where('title', 'like', '%' . $request->title . '%');
        })
        ->when($request->filled('status'), function ($query) use ($request) {
            return $query->where('status', $request->status);
        })
        ->get()
        ->map(function ($vacancy) {
            Carbon::setLocale('id');
            $vacancy->closing_date_formatted = Carbon::parse($vacancy->closing_date)->translatedFormat('d F Y');

            $vacancy->job_description = str_replace(['[', ']', '"'], '', $vacancy->job_description);
            $vacancy->job_description = explode(',', $vacancy->job_description);
            $vacancy->job_description = array_map('trim', $vacancy->job_description);

            $vacancy->qualifications = str_replace(['[', ']', '"'], '', $vacancy->qualifications);
            $vacancy->qualifications = explode(',', $vacancy->qualifications);
            $vacancy->qualifications = array_map('trim', $vacancy->qualifications);

            return $vacancy;
        });

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

    public function update(UpdateVacancyRequest $request, $id)
    {
        $data = $request->validated();

        $userId = auth()->id();

        $this->vacancyRepository->updateVacancies($id,$data,$userId);


        return redirect()->route('vacancy.index')->with('success', 'Vacancy updated successfully!');

    }

    public function destroy($id){
        $userId = auth()->id();

        $berhasil = $this->vacancyRepository->delete($id,$userId);

        if ($berhasil) {
            return redirect()->route('vacancy.index')->with('success', 'Vacancy deleted successfully!');
        } else {
            return redirect()->route('vacancy.index')->with('error', 'Failed to delete vacancy.');
        }
    }

}
