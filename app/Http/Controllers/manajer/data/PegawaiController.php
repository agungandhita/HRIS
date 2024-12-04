<?php

namespace App\Http\Controllers\manajer\data;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePegawaiRequest;
use App\Repositories\Pegawai\PegawaiRepository;

class PegawaiController extends Controller
{

    protected $pegawaiRepository;

    public function __construct(PegawaiRepository $pegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function index() {

        return view ('manajer.data.index', [
            'pegawai' => $this->pegawaiRepository->index()
        ]);
    }

    public function store(StorePegawaiRequest $request){
        try {
            $data = $request->all();

            $this->pegawaiRepository->store($data);

            return redirect()->route('data')->with('success', 'Pegawai berhasil disimpan!');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan pegawai: ' . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan saat menyimpan pegawai. Coba lagi.');
        }
    }
}
