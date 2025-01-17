<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        $moduleStudent = \App\Models\ModuleStudents::where('user_id', $user->id)->first();

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect()->route('user.dashboard', $moduleStudent->id);
            }
        }

        return $next($request);
    }
}
