<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kamus extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'link',
        'categories_id'
    ]; 

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
