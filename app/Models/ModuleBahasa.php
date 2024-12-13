<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleBahasa extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function quiz(){
        return $this->hasMany(Quiz::class, 'module_bahasa_id', 'id');
    }

    public function students(){
        return $this->belongsToMany(User::class, 'module_students', 'module_bahasa_id', 'user_id');
    }

    public function studentsprogress(){
        return $this->belongsToMany(User::class, 'user_progress', 'module_bahasa_id', 'user_id');
    }
}
