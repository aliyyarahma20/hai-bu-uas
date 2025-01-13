<?php
// UserActivityController.php
namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserActivityController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $activities = $user->activities()
            ->orderBy('visit_date', 'desc')
            ->get()
            ->map(function ($activity) {
                return [
                    'id' => $activity->id,
                    'user_id' => $activity->user_id,
                    'visit_date' => $activity->visit_date->format('Y-m-d'),
                    'created_at' => $activity->created_at,
                    'updated_at' => $activity->updated_at
                ];
            });

        return response()->json($activities);
    }

    public function store(Request $request)
    {
        $request->validate([
            'visit_date' => 'required|date'
        ]);

        $date = Carbon::parse($request->visit_date)->toDateString();
        
        // Cek apakah sudah ada aktivitas untuk tanggal tersebut
        $exists = auth()->user()->activities()
            ->whereDate('visit_date', $date)
            ->exists();

        if (!$exists) {
            $activity = auth()->user()->activities()->create([
                'visit_date' => $date,
            ]);

            return response()->json([
                'status' => 'success',
                'activity' => [
                    'id' => $activity->id,
                    'user_id' => $activity->user_id,
                    'visit_date' => $activity->visit_date->format('Y-m-d'),
                    'created_at' => $activity->created_at,
                    'updated_at' => $activity->updated_at
                ]
            ]);
        }

        return response()->json([
            'status' => 'exists',
            'message' => 'Activity already recorded for this date'
        ]);
    }

    public function getStreak()
    {
        $user = auth()->user();
        
        // Ambil semua aktivitas untuk perhitungan streak
        $activities = $user->activities()
            ->orderBy('visit_date', 'desc')
            ->get();

        $streak = $this->calculateStreak($activities);
        $visitedDates = $activities->pluck('visit_date')
            ->map(fn($date) => $date->format('Y-m-d'));

        return response()->json([
            'current_streak' => $streak,
            'visited_dates' => $visitedDates,
            'total_days' => $visitedDates->count()
        ]);
    }

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

            if ($diffInDays === 1) {
                $streak++;
                $maxStreak = max($maxStreak, $streak);
            } else {
                $streak = 1;
            }

            $prevDate = $currentDate;
        }

        return $maxStreak;
    }
}