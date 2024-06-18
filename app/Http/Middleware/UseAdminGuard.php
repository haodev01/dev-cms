<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UseAdminGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Auth::shouldUse('admin');
        if (Auth::check()) {
            $user = Auth::user();
            logger()->info('Authenticated as admin:', ['user' => $user]);
        } else {
            logger()->info('Not authenticated as admin');
        }

        return $next($request);
    }
}
