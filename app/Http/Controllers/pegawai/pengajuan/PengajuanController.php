<?php

namespace App\Http\Controllers\pegawai\pengajuan;

use App\Models\Absensi;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePengajuanRequest;
use App\Repositories\Pengajuan\PengajuanRepository;
use Illuminate\Support\Facades\Log;

class PengajuanController extends Controller
{
    protected $pengajuanRepository;

    public function __construct(PengajuanRepository $pengajuanRepository)
    {
        $this->pengajuanRepository = $pengajuanRepository;
    }

    public function index()
    {
        return view('pegawai.leave.index');
    }

    public function store(StorePengajuanRequest $request)
{
    try {
        DB::beginTransaction();

        $data = $request->validated();

        // Set default values
        $data['status_pengajuan'] = 'menunggu';
        $data['pegawai_id'] = auth()->user()->pegawai_id;

        // Handle upload file jika ada
        if ($request->hasFile('surat')) {
            $suratPath = $request->file('surat')->store('surat', 'public');
            $data['surat'] = $suratPath;
        }

        // Buat pengajuan tanpa absensi_id dulu
        $data['absensi_id'] = null;

        // Debugging data sebelum disimpan
        Log::info('Data yang akan disimpan:', $data);

        // Simpan pengajuan
        $this->pengajuanRepository->createPengajuan($data);

        DB::commit();
        return redirect()->route('absen.form')->with('success', 'Pengajuan berhasil dibuat.');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    public function approve(Pengajuan $pengajuan)
    {
        try {
            $this->pengajuanRepository->approve($pengajuan);
            return redirect()->back()->with('success', 'Pengajuan berhasil disetujui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
