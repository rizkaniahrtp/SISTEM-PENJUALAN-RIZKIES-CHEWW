<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PeranMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$peran): Response
    {
        if(!Auth::check()){
            return redirect('/login')->withErrors([
                'email' => 'Silahkan login terlebih dahulu',
            ]);
        }

        $user = Auth::user();

        if(!in_array($user->peran, $peran)){
            return redirect('/');
        }
        
        return $next($request);
    }
}
