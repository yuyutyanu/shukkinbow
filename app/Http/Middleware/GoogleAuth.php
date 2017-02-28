<?php

namespace App\Http\Middleware;

use Closure;
use Socialite;


class GoogleAuth
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

//        $user = Socialite::driver('google')->user();
//
//        if (isEmpty($user)) {
//            return redirect('/');
//        }

        return $next($request);

    }
}
