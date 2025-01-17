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

    protected $fillable = [
        'nama',
        'description',
        'categories_id',
        'cover',
        'slug',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function question(){
        return $this->hasMany(Question::class, 'module_bahasa_id', 'id');
    }

    public function students(){
        return $this->belongsToMany(User::class, 'module_students', 'module_bahasa_id', 'user_id');
    }

    public function studentsprogress(){
        return $this->belongsToMany(User::class, 'user_progress', 'module_bahasa_id', 'user_id');
    }

    public function isBookmarkedByUser($userId)
    {
        return $this->bookmarks()->where('user_id', $userId)->exists();
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'module_bahasa_id');
    }

}
