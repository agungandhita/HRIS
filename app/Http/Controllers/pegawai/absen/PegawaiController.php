<?php

namespace App\Http\Controllers\pegawai\absen;

use Log;
use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $detail = $this->absensiRepository->detailAbsen($user->pegawai_id);
        $hasAbsenMasuk = $this->absensiRepository->hasAbsensiToday($user->pegawai_id);

        // dd($detail);
        return view('pegawai.absen.index', [
            'absensi' => $absensi,
            'detail' => $detail,
            'hasAbsenMasuk' => $hasAbsenMasuk,
        ]);
    }

    public function absenMasuk(StoreAbsensiRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();

        $pegawaiId = $request->input('pegawai_id');
        $jamMasuk = Carbon::now('Asia/Jakarta');
        $tanggalAbsensi = now()->toDateString();

        if ($this->absensiRepository->hasAbsensiToday($pegawaiId)) {
            return redirect()->back()->with('error', 'Anda sudah absen masuk hari ini.');
        }

        $keterangan = $jamMasuk->hour < 7 ? 'Tepat Waktu' : 'Terlambat';

        $fotoBase64 = $request->input('foto_masuk');
        $fotoPath = $this->saveBase64Image($fotoBase64, 'absensi/foto_masuk');

        $data = [
            'pegawai_id' => $pegawaiId,
            'tanggal_absensi' => $tanggalAbsensi,
            'jam_masuk' => $jamMasuk->format('H:i'),
            'keterangan' => $keterangan,
            'foto_masuk' => $fotoPath,
        ];

        $this->absensiRepository->store($data);

        return redirect()->back()->with('success', 'Absensi masuk berhasil ditambahkan.');
    }

    public function absenPulang(StoreAbsensiRequest $request)
    {
        $data = $request->validated();

        $pegawaiId = $request->input('pegawai_id');
        $currentTime = Carbon::now('Asia/Jakarta');

        $absensi = $this->absensiRepository->getTodayAbsensi($pegawaiId);

        if (!$absensi) {
            return redirect()->back()->with('error', 'Anda belum melakukan absensi masuk hari ini.');
        }

        if ($currentTime->format('H:i') < '08:00') {
            return redirect()->back()->with('error', 'Tidak bisa absen pulang sebelum jam 14:00.');
        }

        $fotoBase64 = $request->input('foto_pulang');
        $fotoPath = $this->saveBase64Image($fotoBase64, 'absensi/foto_pulang');

        $data = [
            'pegawai_id' => $pegawaiId,
            'tanggal_absensi' => $currentTime->toDateString(),
            'jam_pulang' => $currentTime->format('H:i'),
            'status' => 'masuk',
            'foto_pulang' => $fotoPath,
        ];

        $this->absensiRepository->absensiPulang($pegawaiId, $data);

        return redirect()->back()->with('success', 'Absensi pulang berhasil.');
    }

    public function izinAtauCuti(StoreAbsensiRequest $request, $status)
    {
        $data = $request->validated();

        $pegawaiId = $request->input('pegawai_id');
        $tanggalAbsensi = now()->toDateString();

        // Validasi absensi hari ini
        if ($this->absensiRepository->hasAbsensiToday($pegawaiId)) {
            return redirect()->back()->with('error', 'Anda sudah memiliki absensi hari ini.');
        }

        // Validasi untuk cuti (jika status cuti)
        if ($status === 'cuti' && !$this->absensiRepository->checkCutiLimit($pegawaiId)) {
            return redirect()->back()->with('error', 'Cuti hanya dapat dilakukan maksimal 2 kali dalam sebulan.');
        }

        $data = [
            'pegawai_id' => $pegawaiId,
            'tanggal_absensi' => $tanggalAbsensi,
            'status' => $status,
            'keterangan' => $request->input('keterangan') ?? ucfirst($status),
        ];

        $this->absensiRepository->store($data);

        return redirect()->back()->with('success', ucfirst($status) . ' berhasil dicatat.');
    }



    private function saveBase64Image($base64String, $directory)
    {
        if (!$base64String) {
            return null;
        }

        // Decode base64 string
        $imageData = explode(',', $base64String);
        $decodedImage = base64_decode(end($imageData));

        // Generate unique filename
        $fileName = $directory . '/' . uniqid() . '.png';

        // Simpan file ke folder storage/app/public/$directory
        if (!Storage::disk('public')->put($fileName, $decodedImage)) {
            return null;
        }


        // Return file path untuk disimpan di database
        return $fileName;
    }
}
