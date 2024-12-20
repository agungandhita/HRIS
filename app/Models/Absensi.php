<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensis';
    protected $primaryKey = 'absensi_id';
    protected $fillable = [
        'pegawai_id',
        'tanggal_absensi',
        'jam_masuk',
        'jam_pulang',
        'keterangan',
        'status',
        'foto_masuk',
        'foto_pulang',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

}
