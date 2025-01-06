<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = "pengajuans";
    protected $primaryKey = "pengajuan_id";

    protected $guarded = ['pengajuan_id'];


    protected $fillable = [
        'pegawai_id',
        'absensi_id',
        'status',
        'tanggal_pengajuan',
        'alasan',
        'surat',
        'status_pengajuan'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function absensi()
    {
        return $this->belongsTo(Absensi::class, 'absensi_id');
    }
}
