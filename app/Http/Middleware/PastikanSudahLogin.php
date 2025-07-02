<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Import class Auth
use Symfony\Component\HttpFoundation\Response;

class PastikanSudahLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna TIDAK sedang login
        if (!Auth::check()) {
            // Jika tidak login, alihkan ke halaman login
            return redirect()->route('login');
        }

        // Jika pengguna sudah login, lanjutkan request ke tujuan berikutnya
        return $next($request);
    }
}