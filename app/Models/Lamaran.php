<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lamaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "lamarans";
    protected $primaryKey = "lamar_id";

    protected $guarded = [
        'lamar_id'
    ];

    protected $fillable = [
        'vacancy_id',
        'nama_lengkap',
        'email',
        'tanggal_lahir',
        'no_telepon',
        'kabupaten',
        'kecamatan',
        'alamat_lengkap',
        'cv',
        'foto',
        'jenjang_pendidikan',
        'nama_institusi',
        'jurusan',
        'nilai',
        'nama_perusahaan',
        'sebagai',
        'start_date',
        'end_date',
        'deskripsi_pekerjaan',
    ];

    public function vacancy()
    {
        return $this->hasMany('vacancy_id', 'vacancy_id');
    }

    public function jobApplications()
    {
        return $this->belongsTo(JobApplication::class, 'lamar_id', 'lamar_id');
    }
}
