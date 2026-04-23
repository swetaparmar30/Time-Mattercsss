<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (!in_array(auth()->user()->role, $roles)) {
            $userRole = strtolower(str_replace(' ', '-', auth()->user()->role));
            if ($userRole === 'independent-contractor') {
                return redirect()->route('frontend.independent-contractor.dashboard');
            } elseif ($userRole === 'temporary-employee') {
                return redirect()->route('frontend.temporary-employee.dashboard');
            } elseif ($userRole === 'vendor') {
                return redirect()->route('frontend.vendor.dashboard');
            } elseif (in_array($userRole, ['administrator', 'marketing', 'dealer'])) {
                return redirect('/admin/dashboard');
            }
    }

        return $next($request);
    }
}
