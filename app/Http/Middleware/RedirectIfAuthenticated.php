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

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                if ($guard === 'admin') {
                    return redirect('/admin/dashboard');
                }

                // For the 'web' guard
                $role = strtolower(str_replace(' ', '-', $user->role));
                
                if ($role === 'independent-contractor') {
                    return redirect()->route('frontend.independent-contractor.dashboard');
                } elseif ($role === 'temporary-employee') {
                    return redirect()->route('frontend.temporary-employee.dashboard');
                } elseif ($role === 'vendor') {
                    return redirect()->route('frontend.vendor.dashboard');
                }
                
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
