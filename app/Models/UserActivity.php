<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
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