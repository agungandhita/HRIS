<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthly extends Model
{
    use HasFactory;
    protected $table = "monthly_incomes";
    protected $primaryKey = "monthly_id";

    protected $guarded = [
        'monthly_id'
    ];

    protected $fillable = [
        'user_id',
        'total_income',
        'month',
        'year'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
