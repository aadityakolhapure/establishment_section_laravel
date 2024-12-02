<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Redirect user based on role after authentication.
     */
    protected function redirectToByRole(string $role): string
    {
        return match ($role) {
            'admin' => route('admin.dashboard'),
            'faculty' => route('faculty.dashboard'),
            'hod' => route('hod.dashboard'),
            'principal' => route('principal.dashboard'),
            // default => route('user.dashboard'),
        };
    }

    /**
     * Handle the authenticated user redirection.
     */
    public function authenticated(Request $request, $user): RedirectResponse
    {
        return redirect()->intended($this->redirectToByRole($user->role));
    }

    /**
     * Handle login requests.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $url = $this->redirectToByRole($request->user()->role);

        return redirect()->intended($url);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

