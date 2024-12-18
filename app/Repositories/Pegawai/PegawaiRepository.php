<?php

namespace App\Repositories\Pegawai;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PegawaiRepository implements PegawaiInterface {


    private $pegawaiModel;

    public function __construct(Pegawai $pegawai){
        $this->pegawaiModel = $pegawai;
    }

    public function index() {

        $user = Auth::user();

        if ($user->role !== 'manajer') {
            return collect([]);
        }

        return Pegawai::where('user_id', $user->user_id)->get();
    }

    public function store(array $data)
    {
        $data['user_id'] = Auth::id();

        $nip = $this->generateNip($data['tanggal_masuk']);
        $data['nip'] = $nip;

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return Pegawai::create($data);
    }

    private function generateNip($tanggalLahir)
    {
        // Parse tanggal lahir
        $tanggal = \Carbon\Carbon::parse($tanggalLahir);
        $tahun = $tanggal->format('y'); // 2 digit tahun
        $bulan = $tanggal->format('m'); // 2 digit bulan

        // Ambil ID terakhir dari tabel pegawai
        $lastPegawai = Pegawai::latest('pegawai_id')->first();
        $nextId = $lastPegawai ? $lastPegawai->pegawai_id + 1 : 1;

        // Kombinasikan untuk membuat NIP (6 digit)
        $nip = $tahun . $bulan . str_pad($nextId, 2, '0', STR_PAD_LEFT);

        return $nip;
    }




}
