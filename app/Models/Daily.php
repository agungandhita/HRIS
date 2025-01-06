<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    use HasFactory;

    protected $table = "daily_incomes";
    protected $primaryKey = "daily_id";

    protected $guarded = [
        'daily_id'
    ];

    protected $fillable = [
        'user_id',
        'amount',
        'income_date',
        'description',
        'foto',
        'user_created',
        'user_updated'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
