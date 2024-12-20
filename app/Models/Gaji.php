<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'penggajians';
    protected $primaryKey = 'gaji_id';
    protected $fillable = [
        'pegawai_id',
        'tanggal_gaji',
        'total_hari_kerja',
        'potongan_terlambat',
        'total_gaji'
    ];

    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
