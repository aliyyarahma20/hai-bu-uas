<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'visit_date'
    ];

    protected $casts = [
        'visit_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}