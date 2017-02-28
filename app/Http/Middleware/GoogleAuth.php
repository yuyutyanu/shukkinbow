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
        /*
         *  socialite認証時にauth 情報をセッションに保存して空だったらリダイレクトする予定。
         */
        if (Empty($user)) {
            return redirect('/');
        }
        return $next($request);
    }
}
