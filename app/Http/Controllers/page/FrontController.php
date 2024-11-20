<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
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


    public function detail(string $slug) {

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


    public function apply(StoreEmployeRequest $request)
    {
        try {
            $cvPath = $request->file('cv')->store('uploads/cv', 'public');
            $fotoPath = $request->file('foto')->store('uploads/foto', 'public');
            $suratLamaranPath = $request->file('surat_lamaran')->store('uploads/surat_lamaran', 'public');

            $employeData = $request->except(['vacancy_id', 'cv', 'foto', 'surat_lamaran']);
            $employeData['cv'] = $cvPath;
            $employeData['foto'] = $fotoPath;
            $employeData['surat_lamaran'] = $suratLamaranPath;

            $jobApplicationData = [
                'vacancy_id' => $request->input('vacancy_id'),
                'employe' => $employeData
            ];

            $applicationSuccessful = $this->JobApplicationRepository->applyForJob($jobApplicationData);

            if ($applicationSuccessful) {
                return redirect()->route('career.detail', $request->input('vacancy_id'))->with('success', 'Lamaran berhasil di kirim');
            }

            return back()->with('error', 'ada yang salah');

        } catch (\Exception $e) {
            return back()->with('error', 'gagal: ' . $e->getMessage());
        }
    }

}
