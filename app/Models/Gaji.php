<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'penggajians';
    protected $primaryKey = 'penggajian_id';
    protected $fillable = [
        'pegawai_id',
        'jumlah_masuk',
        'jumlah_terlambat',
        'total_gaji',
        'total_potongan',
        'gaji_bersih',
        'bulan',
        'tahun',
        'tanggal_penggajian',
        'keterangan',
        'status'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'pegawai_id');
    }

    // public function absensi() {
    //     return $this->belongsTo(Absensi::class, 'absensi_id');
    // }

    // public function detail() {
    //     return $this->belongsTo(Gaji::class, 'gaji_id');
    // }
}
