<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateLoginAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle($request, Closure $next)
        {
            $user = \App\Models\User::where('email', $request->email)->first();

            // ❌ Admin ne frontend thi block karo
            if ($user && $user->role === 'administrator') {
                return back()->withErrors([
                    'email' => 'Administrator cannot login here.',
                ]);
            }

            return $next($request);
        }
}
