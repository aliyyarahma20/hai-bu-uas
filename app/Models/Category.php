<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function moduleBahasas()
    {
        return $this->hasMany(ModuleBahasa::class, 'categories_id');
    }

    public function kamus()
    {
        return $this->hasOne(Kamus::class, 'categories_id');
    }
}
