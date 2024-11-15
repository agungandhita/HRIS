<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "vacancies";
    protected $primaryKey = "vacancy_id";

    protected $guarded =[
        'vacancy_id'
    ];
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'vacancy_id', 'vacancy_id');
    }
    
}
