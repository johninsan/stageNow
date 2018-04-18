<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Checklogin
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
        if(!Session::has('login')){
            return redirect('login')->with('alert-success','<script> window.onload = swal("Oops!","Kamu harus login terlebih dahulu","error")</script>');
        }
        else{
            return $next($request);
        }
    }
}
