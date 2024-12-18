<?php

namespace App\Repositories\absensi;

use App\Models\Absensi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class AbsensiRepository implements AbsensiInterface
{

    private $absensiModel;

    public function __construct(Absensi $absensi)
    {
        $this->absensiModel = $absensi;
    }

    public function store(array $data)
    {
        return Absensi::create($data);
    }

    public function hasAbsensiToday(int $pegawaiId): bool
    {
        return Absensi::where('pegawai_id', $pegawaiId)
            ->whereDate('tanggal_absensi', Carbon::today())
            ->exists();
    }

    public function getTodayAbsensi(int $pegawaiId)
    {
        return Absensi::where('pegawai_id', $pegawaiId)
            ->whereDate('tanggal_absensi', Carbon::today())
            ->first();
    }

    public function absensiPulang(int $pegawaiId, array $data)
    {
        $absensi = $this->getTodayAbsensi($pegawaiId);
        if ($absensi) {
            $absensi->update($data);
        }
        return $absensi;
    }

    public function dataAbsen(int $pegawaiId) {
        return Absensi::where('pegawai_id', $pegawaiId)
        ->orderBy('tanggal_absensi', 'desc')
        ->get();
    }
}
