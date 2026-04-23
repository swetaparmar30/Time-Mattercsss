<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('frontend.login');
        }

        if (!in_array(Auth::user()->role, $roles)) {
            $userRole = strtolower(str_replace(' ', '-', Auth::user()->role));
            if ($userRole === 'independent-contractor') {
                return redirect()->route('frontend.independent-contractor.dashboard');
            } elseif ($userRole === 'temporary-employee') {
                return redirect()->route('frontend.temporary-employee.dashboard');
            } elseif ($userRole === 'vendor') {
                return redirect()->route('frontend.vendor.dashboard');
            }
            
            return redirect()->to('admin/dashboard'); 
        }

        return $next($request);
    }
}
