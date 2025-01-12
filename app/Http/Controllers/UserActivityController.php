<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserActivityController extends Controller
{
    public function track(Request $request)
    {
        $request->validate([
            'date' => 'required|date', // Validasi input 'date'
        ]);

        $date = Carbon::parse($request->date)->toDateString(); // Format ke tanggal saja

        // Cek apakah sudah ada aktivitas untuk tanggal tersebut
        $exists = auth()->user()->activities()->where('visit_date', $date)->exists();

        if (!$exists) {
            // Simpan aktivitas baru
            auth()->user()->activities()->create([
                'visit_date' => $date,
            ]);
        }

        // Hitung streak setelah aktivitas baru ditambahkan
        $streak = $this->calculateStreak(auth()->user());

        return response()->json([
            'streak' => $streak,
        ]);
    }


    public function getStreak()
    {
        $user = auth()->user(); // Pengguna yang sedang login

        // Hitung streak
        $streak = $this->calculateStreak($user);

        // Ambil semua tanggal yang sudah dikunjungi
        $visitedDates = $user->activities()->pluck('visit_date')->map(function ($date) {
            return Carbon::parse($date)->toDateString(); // Format ke tanggal saja
        });

        return response()->json([
            'streak' => $streak,
            'visited_dates' => $visitedDates,
        ]);
    }


    // Fungsi untuk menghitung streak berdasarkan aktivitas
    private function calculateStreak($user)
{
    // Ambil semua aktivitas pengguna yang sudah diurutkan berdasarkan tanggal
    $activities = $user->activities()->orderBy('visit_date', 'desc')->pluck('visit_date')->toArray();

    $streak = 0;       // Menyimpan streak terbesar
    $currentStreak = 0; // Menyimpan streak saat ini
    $prevDate = null;  // Tanggal sebelumnya untuk perhitungan

    foreach ($activities as $date) {
        $currentDate = Carbon::parse($date);

        if ($prevDate && $currentDate->diffInDays($prevDate) === 1) {
            // Jika tanggal ini adalah hari sebelumnya dari tanggal sebelumnya
            $currentStreak++;
        } elseif ($prevDate && $currentDate->diffInDays($prevDate) > 1) {
            // Jika ada jeda lebih dari 1 hari, reset streak
            $streak = max($streak, $currentStreak);
            $currentStreak = 1; // Mulai streak baru
        } else {
            // Untuk tanggal pertama dalam loop
            $currentStreak = 1;
        }

        $prevDate = $currentDate;
    }

    // Pastikan streak terbesar diperbarui
    return max($streak, $currentStreak);
}
}
