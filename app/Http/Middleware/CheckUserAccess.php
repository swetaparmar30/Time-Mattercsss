<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle($request, Closure $next)
        {
            $user = \App\Models\User::where('email', $request->email)->first();

            if ($user && in_array($user->role, [
                'Independent Contractor',
                'Temporary Employee',
                'Vendor'
            ])) {
                return back()->withErrors([
                    'email' => 'You are not allowed to login here.',
                ]);
            }

            return $next($request);
        }
}
