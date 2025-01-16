<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserActivity; // Menggunakan model UserActivity
use Carbon\Carbon;

class StreakController extends Controller
{
    // Constructor untuk memastikan pengguna yang sudah login
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    // Mengambil data streak pengguna
    public function showStreak(Request $request)
    {
        // Mengambil data pengguna yang sedang login
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Ambil data aktivitas pengguna, seperti tanggal kunjungan
        $activities = UserActivity::where('user_id', $user->id)
            ->select('visit_date')
            ->orderBy('visit_date', 'asc')
            ->get();

        $streak = $this->calculateStreak($activities);

        // Mengambil tanggal yang dikunjungi oleh pengguna
        $visitedDates = $activities->pluck('visit_date')
            ->map(fn($date) => Carbon::parse($date)->format('Y-m-d'));

        return response()->json([
            'current_streak' => $streak,
            'visited_dates' => $visitedDates,
            'total_days' => $visitedDates->count()
        ]);
    }

    // Fungsi untuk menghitung streak
    private function calculateStreak($activities)
    {
        if ($activities->isEmpty()) {
            return 0;
        }

        $streak = 1;
        $maxStreak = 1;
        $prevDate = Carbon::parse($activities->first()->visit_date);

        foreach ($activities->slice(1) as $activity) {
            $currentDate = Carbon::parse($activity->visit_date);
            $diffInDays = $prevDate->diffInDays($currentDate);

            // Jika selisih hari antara dua aktivitas hanya 1 hari, tambah streak
            if ($diffInDays === 1) {
                $streak++;
                $maxStreak = max($maxStreak, $streak);
            } else {
                $streak = 1; // Reset streak jika selisih lebih dari 1 hari
            }

            $prevDate = $currentDate;
        }

        return $maxStreak;
    }
}
