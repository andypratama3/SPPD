<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->role == '2'){
                return $next($request);
            }else{
                Session::flash('status', 'failed');
                Session::flash('message', 'Anda Bukan Admin');
                return redirect('/login');
            }
        }else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Mohon Login Terlebih Dahulu!');
            return redirect('/login');
        }
    }
}
