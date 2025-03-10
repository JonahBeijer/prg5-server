<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
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
    // Voeg logging toe
Log::info('Login request', ['email' => $request->email]);
try {
    $request->authenticate();
    Log::info('User authenticated successfully', ['email' => $request->email]);
    $request->session()->regenerate();
    return redirect()->route('profile.edit');
} catch (\Exception $e) {
    Log::error('Login failed', ['email' => $request->email, 'error' => $e->getMessage()]);
    return redirect()->back()->withErrors(['email' => 'Credentials do not match our records.']);
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
