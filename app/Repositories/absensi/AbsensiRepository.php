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
        ->whereDate('tanggal_absensi', now()->toDateString())
        ->whereNotNull('jam_masuk')
        ->exists();
    }

    public function checkCutiLimit($pegawaiId)
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $cutiCount = Absensi::where('pegawai_id', $pegawaiId)
            ->where('status', 'cuti')
            ->whereYear('tanggal_absensi', $currentYear)
            ->whereMonth('tanggal_absensi', $currentMonth)
            ->count();

        return $cutiCount < 2;
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

    public function dataAbsen(int $pegawaiId)
    {
        return Absensi::where('pegawai_id', $pegawaiId)
            ->orderBy('tanggal_absensi', 'desc')
            ->get();
    }

    public function detailAbsen($pegawaiId)
    {
        return Absensi::where('pegawai_id', $pegawaiId)
                      ->whereDate('created_at', now())
                      ->first();
    }

    public function checkUnclosedAbsensi()
    {
        return Absensi::whereNull('jam_pulang')
            ->whereDate('tanggal_absensi', now()->toDateString())
            ->get();
    }

    public function markUnclosedAbsensiAsAbsent()
    {
        $absensis = $this->checkUnclosedAbsensi();
        $limitTime = Carbon::parse('01:00:00');

        foreach ($absensis as $absensi) {
            if (now()->greaterThanOrEqualTo($limitTime)) {
                $absensi->update(['status' => 'absen']);
            }
        }
    }

    public function create(array $data)
    {
        return Absensi::create($data);
    }
}
