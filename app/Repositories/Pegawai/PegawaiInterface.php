<?php
namespace App\Repositories\Pegawai;

interface PegawaiInterface {
    public function index();
    public function store(array $data);
}
