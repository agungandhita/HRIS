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

    protected $guarded =[
        'lamar_id'
    ];

    public function vacancy() {
        return $this->hasMany('vacancy_id', 'vacancy_id');
    }
}
