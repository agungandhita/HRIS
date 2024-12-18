<?php

namespace App\Repositories\absensi;

interface AbsensiInterface {

    public function store(array $data);
    public function hasAbsensiToday(int $pegawaiId): bool;
    public function getTodayAbsensi(int $pegawaiId);
    public function absensiPulang(int $pegawaiId, array $data);
    public function dataAbsen(int $pegawaiId);

}
