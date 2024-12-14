<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = "job_applications";
    protected $primaryKey = "application_id";

    protected $guarded = ['application_id'];


    protected $fillable = [
        'vacancy_id',
        'lamar_id',
        'status',
    ];

    // Relasi dengan Vacancy
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id', 'vacancy_id');
    }

    public function lamaran() {
        return $this->hasMany(Lamaran::class, 'lamar_id' );
    }
}
