<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class SiswaMiddleware
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

        if(!Auth::check() && !session()->has('id_sekolah')){
            return redirect('/')->with('error',"Harap verifikasi kode sekolah terlebih dahulu");
        }
        if(Auth::check() && Auth::user()->level != "siswa"){
            Auth::logout();
            return redirect('/')->with('error',"Kamu tidak diperbolehkan mengakses halaman tersebut");
        }
        return $next($request);
    }
}
