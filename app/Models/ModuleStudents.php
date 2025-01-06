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
    public function moduleBahasa()
    {
        return $this->belongsTo(ModuleBahasa::class, 'module_bahasa_id');
    }

   
}
