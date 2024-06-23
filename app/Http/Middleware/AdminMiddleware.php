<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guard('admin')->check()) {
            $user = auth()->guard('admin')->user();

            // Check if the admin user's status is 1
            if ($user->status == 1) {
                // If the status is 1, allow access to the requested route
                return $next($request);
            } else {
                // If the status is not 1, log out the user and redirect to the login page
                auth()->guard('admin')->logout();
                $request->session()->invalidate();
                return redirect()->route('admin.login')->with('info', 'Akunmu sudah tidak aktif.');
            }
        }

        // If the user is not authenticated as an admin, redirect to the login page
        return redirect()->route('admin.auth.login')->with('warning', 'Kamu belum login.');
    }
}
