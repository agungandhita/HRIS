<?php

namespace  App\Repositories\penggajian;


interface PenggajianInterface {

    public function getAllWithPegawai();

    public function getById($id);

    public function hitungGaji($bulan, $tahun);

    public function konfirmasiPembayaran($penggajian_id);

    public function getSlipGaji($penggajian_id);

    public function getLaporanGaji($bulan, $tahun);

}
