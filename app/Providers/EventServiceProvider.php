<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Authenticated;
use Carbon\Carbon;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
        parent::boot();

    /// Mendengarkan event login
    Event::listen(Authenticated::class, function ($event) {
        $user = $event->user; // Dapatkan user yang login

        // Cek apakah sudah ada aktivitas pada tanggal hari ini
        $existingActivity = $user->activities()->whereDate('visit_date', Carbon::today()->format('Y-m-d'))->first();

        if (!$existingActivity) {
            // Jika belum ada aktivitas pada hari ini, buat entri baru
            $user->activities()->create([
                'visit_date' => Carbon::now()->format('Y-m-d'), // Simpan tanggal kunjungan
            ]);
        }
    });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
