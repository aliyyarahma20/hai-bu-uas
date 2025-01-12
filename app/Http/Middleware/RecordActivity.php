<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class RecordActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user) {
            // Menambahkan aktivitas setiap kali pengguna mengakses rute tertentu
            $user->activities()->create([
                'visit_date' => Carbon::now()->format('Y-m-d'),
            ]);
        }

        return $next($request);
    }
}
