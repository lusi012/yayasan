<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('admin_logged_in') || !session()->has('id')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin terlebih dahulu.');
        }

        return $next($request);
    }
}
