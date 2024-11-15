<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "employes";
    protected $primaryKey = "employes_id";

    protected $guarded =[
        'employes_id'
    ];

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'employe_id', 'employe_id');
    }

    
}
