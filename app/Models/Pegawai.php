<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Authenticatable
{
    use HasFactory,SoftDeletes, Notifiable;
    protected $table = "pegawais";
    protected $primaryKey = "pegawai_id";

    protected $guarded =[
        'pegawai_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'posisi',
        'tanggal_masuk',
        'no_telepon',
        'email',
        'password',
        'user_id',
        'nama_bank',
        'no_rekening',
        'atas_nama',
        'gaji_pokok'
    ];


    public function manajer() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function absensi() {
        return $this->belongsTo(Absensi::class, 'pegawai_id', );
    }

    public function gaji() {
        return $this->hasMany(Gaji::class, 'pegawai_id', 'pegawai_id');
    }

    public function pengajuan() {
        return $this->hasMany(Pengajuan::class, 'pegawai_id', 'pegawai_id');
    }



}
