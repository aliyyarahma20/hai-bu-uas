<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleStudents extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $fillable = ['user_id', 'categories_id'];


    /**
     * Relasi ke tabel User
     * Setiap ModuleStudents berhubungan dengan satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke tabel ModuleBahasa
     * Setiap ModuleStudents berhubungan dengan satu ModuleBahasa.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

   
}
