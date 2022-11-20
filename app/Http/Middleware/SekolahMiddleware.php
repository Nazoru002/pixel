<?php

namespace App\Http\Middleware;

use Closure;

class SekolahMiddleware
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

        if(!session()->has('id_sekolah')){
            return redirect('/')->with('error',"Harap verifikasi kode sekolah terlebih dahulu");
        }
        return $next($request);
    }
}
