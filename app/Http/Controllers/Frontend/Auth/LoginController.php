<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\LoginRequest;

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
    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::guard('web')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            
            $request->session()->regenerate();

            $user = Auth::guard('web')->user();
            
             if ($user->status == 0) {
                Auth::logout();
                return back()
                       ->withErrors(['email' => 'Your account is pending admin approval. Please wait for activation.'])
                       ->withInput($request->only('email'));
            } elseif ($user->status == 2) {
                Auth::logout();
                return back()
                       ->withErrors(['email' => 'Your account has been rejected by admin.'])
                       ->withInput($request->only('email'));
            } elseif ($user->status == 3) {
                Auth::logout();
                return back()
                       ->withErrors(['email' => 'Your account is currently inactive. Please contact admin.'])
                       ->withInput($request->only('email'));
            }


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
        $role = strtolower(str_replace(' ', '-', $user->role));
        
        return match ($role) {
            'independent-contractor' => redirect()->route('frontend.independent-contractor.dashboard')
                                        ->with('success', 'Welcome Independent Contractor!'),

            'temporary-employee'     => redirect()->route('frontend.independent-contractor.dashboard')
                                        ->with('success', 'Welcome Temporary Employee!'),
                                        
            'vendor'                 => redirect()->route('frontend.independent-contractor.dashboard')
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
        Auth::guard('web')->logout();

        return redirect()->route('frontend.login')
                         ->with('success', 'You have been logged out successfully.');
    }
}