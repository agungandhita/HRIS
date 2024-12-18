<?php

namespace App\Http\Controllers\pegawai\absen;

use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAbsensiRequest;
use App\Repositories\absensi\AbsensiRepository;

class PegawaiController extends Controller
{
    protected $absensiRepository;

    public function __construct(AbsensiRepository $absensiRepository)
    {
        $this->absensiRepository = $absensiRepository;
    }

    public function index()
    {   
        $user = auth('pegawai')->user();

        $absensi = $this->absensiRepository->dataAbsen($user->pegawai_id);
        // dd($absensi);

        return view('pegawai.absen.index', [
            'absensi' => $absensi,
        ]);
    }

    public function absenMasuk(StoreAbsensiRequest $request)
    {
        $data = $request->validated();
    
        $pegawaiId = $request->input('pegawai_id');
        $jamMasuk = Carbon::now('Asia/Jakarta');
        $tanggalAbsensi = now()->toDateString();
    
        if ($this->absensiRepository->hasAbsensiToday($pegawaiId)) {
            return redirect()->back()->with('error', 'Pegawai sudah absen masuk hari ini.');
        }
    
        $keterangan = $jamMasuk->hour < 7 ? 'Tepat Waktu' : 'Terlambat';
    
        $data = [
            'pegawai_id' => $pegawaiId,
            'tanggal_absensi' => $tanggalAbsensi,
            'jam_masuk' => $jamMasuk->format('H:i'),
            'keterangan' => $keterangan,
        ];
    
        $this->absensiRepository->store($data);
    
        return redirect()->back()->with('success', 'Absensi masuk berhasil ditambahkan.');
    
    }

    // absen pulang

    public function absenPulang(StoreAbsensiRequest $request)
    {
        $data = $request->validated();
    
        $pegawaiId = $request->input('pegawai_id');
        $jamPulang = Carbon::now('Asia/Jakarta');

    
        // Cek apakah pegawai sudah absen masuk
        $absensi = $this->absensiRepository->getTodayAbsensi($pegawaiId);
        if (!$absensi) {
            return redirect()->back()->with('error', 'Pegawai belum melakukan absensi masuk hari ini.');
        }
    
        // Tidak bisa absen pulang sebelum jam 17.00
        if ($jamPulang->hour > '17:00:00') {
            return redirect()->back()->with('error', 'Tidak bisa absen pulang sebelum jam 17:00.');
        }

    
        // Update absensi pulang
        $data = [
            'jam_pulang' => $jamPulang->format('H:i'),
        ];
    
        $this->absensiRepository->absensiPulang($pegawaiId, $data);
    
        return redirect()->back()->with('success', 'Absensi pulang berhasil ditambahkan.');
    }

}
