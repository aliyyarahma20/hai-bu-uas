<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = [
        'user_id',
        'module_bahasa_id',
        'title',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function moduleBahasa()
    {
        return $this->belongsTo(ModuleBahasa::class,'module_bahasa_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}