<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // Periksa apakah email terdaftar
        if (!\App\Models\User::where('email', $credentials['email'])->exists()) {
            return back()->withErrors([
                'email' => 'Email tidak terdaftar.',
            ])->onlyInput('email');
        }

        // Coba autentikasi kredensial
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'password' => 'Kata sandi yang Anda masukkan salah.',
            ])->onlyInput('email'); // Simpan hanya input email untuk memudahkan pengguna
        }

        // Jika berhasil login
        $request->session()->regenerate();

        // Tambahkan logika untuk mengarahkan ke pilih-bahasa.edit
        $user = auth()->user();

        // Periksa role pengguna
        if ($user->hasRole('admin')) {
            // Jika role admin, arahkan ke dashboard admin
            return redirect()->route('dashboard.module-bahasa.index');
        }

        // Logika untuk pengguna non-admin
        $moduleStudent = \App\Models\ModuleStudents::where('user_id', $user->id)->first();

        if ($moduleStudent) {
            // Jika data ditemukan, arahkan ke halaman edit
            return redirect()->route('pilih.bahasa.edit', $moduleStudent->id);
        } else {
            // Jika data tidak ditemukan, buat data baru lalu arahkan
            $newModuleStudent = \App\Models\ModuleStudents::create([
                'user_id' => $user->id,
                'categories_id' => null, // Atau nilai default
            ]);

            return redirect()->route('pilih.bahasa.edit', $newModuleStudent->id);
        }
    }



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
