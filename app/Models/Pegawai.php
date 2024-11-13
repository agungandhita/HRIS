<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "pegawais";
    protected $primaryKey = "pegawai_id";

    protected $guarded =[
        'pegawai_id'
    ];

    public function manajer() {
        return $this->belongsTo(User::class, 'user_id', 'user_id')->where('role', 'manajer');
    }
    

}
