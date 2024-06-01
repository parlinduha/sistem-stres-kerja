<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(route('welcome', absolute: false));
    // }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Mengambil pengguna yang sedang login
        $user = $request->user();

        // Mengarahkan berdasarkan peran pengguna
        if ($user->role == 'staff') {
            return redirect()->intended(route('welcome', ['absolute' => false]));
        } elseif ($user->role == 'admin') {
            return redirect()->intended(route('admin.dashboard.index', ['absolute' => false]));
        }

        // Default redirect jika peran tidak diketahui
        return redirect()->intended(route('welcome', ['absolute' => false]));
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
