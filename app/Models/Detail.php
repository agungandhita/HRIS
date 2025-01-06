<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'detail_gaji';
    protected $primaryKey = 'detail_id';
    protected $fillable = [
        'gaji_id',
        'desc'
    ];

    public function gaji() {
        return $this->hasMany(Gaji::class, 'gaji_id');
    }
}
