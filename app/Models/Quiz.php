<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function modulebahasa(){
        return $this->belongsTo(ModuleBahasa::class);
    }

    public function question(){
        return $this->hasMany(Question::class, 'quiz_id', 'id');
    }
}
