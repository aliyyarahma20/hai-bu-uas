<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan semua aktivitas user
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        \Log::info('Data User:', ['user_id' => $user->id]); // Log user ID

        $activities = UserActivity::where('user_id', $user->id)
            ->orderBy('visit_date', 'asc') // Pastikan urutan benar
            ->get(['id', 'visit_date']); // Hanya ambil data penting

        return response()->json($activities);
    }

    // Menambahkan aktivitas
    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        \Log::info('User authenticated:', ['user_id' => $user->id]); // Log user ID

        $validated = $request->validate([
            'visit_date' => 'required|date',
        ]);

        \Log::info('Request data validated:', $validated); // Log data request

        // Cek apakah data untuk tanggal ini sudah ada
        $existingActivity = UserActivity::where('user_id', $user->id)
            ->where('visit_date', $validated['visit_date'])
            ->exists();

        if ($existingActivity) {
            return response()->json(['message' => 'Activity already exists'], 200);
        }

        // Simpan data
        $activity = UserActivity::create([
            'user_id' => $user->id,
            'visit_date' => $validated['visit_date'],
        ]);

        return response()->json($activity, 201);
    }

    // Menampilkan streak
    public function showStreak()
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        \Log::info('User authenticated:', ['user_id' => $user->id]); // Log user ID

        $activities = UserActivity::where('user_id', $user->id)
            ->orderBy('visit_date', 'asc') // Urutkan untuk menghitung streak
            ->get(['visit_date']);

        \Log::info('Activities Retrieved for Streak:', $activities->toArray()); // Log daftar aktivitas

        $streak = $this->calculateStreak($activities);

        \Log::info('Streak Calculated:', ['current_streak' => $streak]); // Log hasil streak

        $visitedDates = $activities->pluck('visit_date')
            ->map(fn($date) => Carbon::parse($date)->format('Y-m-d'));

        return response()->json([
            'current_streak' => $streak,
            'visited_dates' => $visitedDates,
            'total_days' => $visitedDates->count(),
        ]);
    }

    private function calculateStreak($activities)
    {
        if ($activities->isEmpty()) {
            \Log::info('No activities found for streak calculation.');
            return 0;
        }

        $streak = 1;
        $maxStreak = 1;
        $prevDate = Carbon::parse($activities->first()->visit_date);

        foreach ($activities->slice(1) as $activity) {
            $currentDate = Carbon::parse($activity->visit_date);
            $diffInDays = $prevDate->diffInDays($currentDate);

            if ($diffInDays === 1) {
                $streak++;
                $maxStreak = max($maxStreak, $streak);
            } else {
                $streak = 1;
            }

            \Log::info('Streak Progress:', [
                'current_date' => $currentDate->format('Y-m-d'),
                'streak' => $streak,
                'max_streak' => $maxStreak,
            ]);    

            $prevDate = $currentDate;
        }

        return $maxStreak;
    }
}