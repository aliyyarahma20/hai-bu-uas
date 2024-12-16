<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function modulebahasa(){
        return $this->belongsTo(ModuleBahasa::class);
    }

    public function answer(){
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
}
