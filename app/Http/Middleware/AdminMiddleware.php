<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!Auth::check()){
            return redirect(route('admin-login'))->with('error',"Harap login terlebih dahulu!");
        }
        if(Auth::check() && Auth::user()->level != "admin"){
            Auth::logout();
            return redirect('/')->with('error',"Kamu tidak diperbolehkan mengakses halaman tersebut");
        }
        return $next($request);
    }
}
