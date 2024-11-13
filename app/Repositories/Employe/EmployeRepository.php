<?php

namespace App\Repositories\Employe;

use App\Models\Employe;


class EmployeRepository implements EmployeInterface
{
    private $employeModel;

    public function __construct(Employe $employe)
    {
        $this->employeModel = $employe;
    }

    /**
     * Method untuk menyimpan data pegawai (employe).
     *
     * @param array $data
     * @return Employe
     */
    public function store(array $data)
    {
        // Upload file CV
        if (isset($data['cv'])) {
            $data['cv'] = $data['cv']->store('uploads/cv', 'public');
        }

        // Upload file foto (jika ada)
        if (isset($data['foto'])) {
            $data['foto'] = $data['foto']->store('uploads/foto', 'public');
        }

        // Upload file surat lamaran (jika ada)
        if (isset($data['surat_lamaran'])) {
            $data['surat_lamaran'] = $data['surat_lamaran']->store('uploads/surat_lamaran', 'public');
        }

        // Menyimpan data pegawai ke dalam database
        return $this->employeModel->create([
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'nomor_ktp' => $data['nomor_ktp'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'no_telepon' => $data['no_telepon'],
            'provinsi' => $data['provinsi'],
            'kabupaten' => $data['kabupaten'],
            'alamat_lengkap' => $data['alamat_lengkap'],
            'posisi' => $data['posisi'],
            'cv' => $data['cv'],
            'foto' => $data['foto'],
            'surat_lamaran' => $data['surat_lamaran'],
            'jenjang_pendidikan' => $data['jenjang_pendidikan'],
            'nama_institusi' => $data['nama_institusi'],
            'jurusan' => $data['jurusan'],
            'gpa' => $data['gpa'],
            'nama_perusahaan' => $data['nama_perusahaan'] ?? null,
            'sebagai' => $data['sebagai'] ?? null,
            'lama_bekerja' => $data['lama_bekerja'] ?? null,
            'deskripsi_pekerjaan' => $data['deskripsi_pekerjaan'] ?? null,
            'status' => $data['status'],
            'user_created' => auth()->id(),
        ]);
    }

    public function update(int $id, array $data) {
        
    }
}
