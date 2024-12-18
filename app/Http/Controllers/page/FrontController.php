<?php

namespace App\Http\Controllers\page;

use Exception;
use App\Models\Vacancy;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreLamaranRequest;
use App\Repositories\Loker\LokerInterface;
use App\Repositories\Vacancy\VacancyInterface;
use App\Repositories\Lamaran\LamaranRepository;
use App\Repositories\Application\JobApplicationInterface;
use GuzzleHttp\Psr7\Request;

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
        return view('home.page.home');
    }

    public function career()
    {
        $loker = $this->LokerRepository->showAll();

        if ($loker->isEmpty()) {
            return view('home.page.career', [
                'message' => 'Saat ini tidak ada lowongan tersedia.'
            ]);
        }

        return view('home.page.career', [
            'data' => $loker
        ]);
    }


    public function detail($id)
    {

        $loker = $this->LokerRepository->getById($id);

        $other = $this->LokerRepository->showAll();

        return view('home.page.detail', [
            'loker' => $loker,
            'list' => $other
        ]);
    }

    public function applyForm($id)
    {
        $loker = $this->LokerRepository->getById($id);

        return view('home.page.apply', [

            'loker' => $loker,
        ]);
    }

    /**
     * Simpan lamaran pekerjaan.
     *
     * @param StoreLamaranRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreLamaranRequest $request, $id)
    {
        // dd($request->all());
        $path = $request->file('cv')->store('resumes', 'public');
        $foto = $request->file('foto')->store('foto', 'public');

        $data = $request->only([
            'vacancy_id',
            'nama_lengkap',
            'email',
            'tanggal_lahir',
            'no_telepon',
            'kabupaten',
            'kecamatan',
            'alamat_lengkap',
            'jenjang_pendidikan',
            'nama_institusi',
            'jurusan',
            'nilai',
            'nama_perusahaan',
            'sebagai',
            'deskripsi_pekerjaan',
            'start_date',
            'end_date',
        ]);

        $data['cv'] = $path;
        $data['foto'] = $foto;

        $lamaran = $this->LamaranRepository->store($data);

        $this->LamaranRepository->storeJobApplication($data['vacancy_id'], $lamaran->lamar_id);

        if ($lamaran) {
            return redirect()->route('career.apply', ['id' => $id])->with('success', 'Berhasil mengirim lamaran, mohon tunggu informasi selanjutnya.');
        } else {
            return redirect()->route('career.apply', ['id' => $id])->with('error', 'Gagal mengirim lamaran.');
        }

    }


    public function about()
    {

        return view('home.page.about');
    }

    public function coba(Request $request) {}
}
