<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'streak',
        'photos',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function modulebahasa(){
        return $this->belongsToMany(ModuleBahasa::class, 'module_students', 'user_id', 'module_bahasa_id');
    }

    public function userprogess(){
        return $this->belongsToMany(ModuleBahasa::class, 'user_progress', 'user_id', 'module_bahasa_id');
    }

    public function activities()
    {
        return $this->hasMany(UserActivity::class);
    }

    public function getCurrentStreakAttribute()
    {
        $activities = $this->activities()
            ->orderBy('visit_date', 'desc')
            ->get();

        if ($activities->isEmpty()) {
            return 0;
        }

        $streak = 0;
        $currentDate = Carbon::now()->startOfDay(); // Gunakan Carbon untuk mendapatkan tanggal sekarang

        foreach ($activities as $activity) {
            $visitDate = Carbon::parse($activity->visit_date); // Pastikan visit_date adalah objek Carbon

            // Cek apakah tanggal visit berurutan
            if ($visitDate->isSameDay($currentDate)) {
                $streak++; // Jika sama dengan hari ini, tambahkan streak
                $currentDate = $currentDate->subDay(); // Geser tanggal untuk pengecekan besok
            } else {
                break; // Jika tidak berurutan, berhenti
            }
        }

        return $streak;
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
