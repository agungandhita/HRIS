<?php

namespace App\Models;

use Illuminate\Support\Str;
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

    protected static function boot()
    {
        parent::boot();

        // Membuat slug otomatis
        static::creating(function ($vacancy) {
            $vacancy->slug = Str::slug($vacancy->title);
        });
    }

    public function employes()
    {
        return $this->hasMany(Employe::class, 'vacancy_id', 'vacancy_id');
    }

}
