<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "job_application";
    protected $primaryKey = "application_id";

    protected $guarded =[
        'application_id'
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id', 'vacancy_id');
    }

    /**
     * Relasi dengan Employe (Many to One)
     */
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id', 'employe_id');
    }
}
