<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "employes";
    protected $primaryKey = "employe_id";

    protected $guarded =[
        'employe_id'
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id', 'vacancy_id');
    }


}
