<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
 * Where to redirect users after login.
 * This prevents redirecting to admin/login
 */
    protected $redirectTo = '/dashboard';

    /**
     * Show Login Page
     */
    public function index(): View
    {
        return view('frontend.auth.login');   // Create this blade file if not exists
    }

    /**
     * Handle Login Request
     */
    public function login(Request $request): RedirectResponse
    {
     
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect to Role-based Dashboard
            return $this->redirectToDashboard($user);
        }

        // If login fails
        return back()
               ->withErrors(['email' => 'Invalid email or password.'])
               ->withInput($request->only('email'));
    }

    /**
     * Role-based Dashboard Redirect
     */
    protected function redirectToDashboard(User $user): RedirectResponse
    {
        return match ($user->role) {
            'Independent Contractor' => redirect()->route('frontend.independent-contractor.dashboard')
                                        ->with('success', 'Welcome Independent Contractor!'),

            'Temporary Employee'     => redirect()->route('frontend.temporary-employee.dashboard')
                                        ->with('success', 'Welcome Temporary Employee!'),
                                        
            'Vendor'                 => redirect()->route('frontend.vendor.dashboard')
                                        ->with('success', 'Welcome Vendor!'),

            default => redirect()->route('dashboard')
                      ->with('success', 'Login successful!'),
        };
    }

    /**
     * Logout
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('frontend.login')
                         ->with('success', 'Logged out successfully.');
    }
}