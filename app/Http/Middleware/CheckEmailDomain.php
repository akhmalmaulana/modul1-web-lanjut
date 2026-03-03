<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEmailDomain
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        // Contoh: hanya email gmail yang boleh hapus
        if (!str_ends_with($user->email, 'maulanaakhmal338@gmail.com')) {
            abort(403, 'Hanya email gmail yang boleh menghapus data.');
        }

        return $next($request);
    }
}