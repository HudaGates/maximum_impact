<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware; // <-- Pastikan ini di-import

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // --- DAFTARKAN ALIAS MIDDLEWARE ANDA DI SINI ---
       $middleware->alias([
        // BENARKAN BARIS INI: Ubah \App\Http\Middleware menjadi \Illuminate\Auth\Middleware
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,

        // BARIS INI SUDAH BENAR, JANGAN DIUBAH
        'sudah_login' => \App\Http\Middleware\PastikanSudahLogin::class,
    ]);

        // Anda juga bisa menambahkan middleware global di sini, contoh:
        // $middleware->append(MyGlobalMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();