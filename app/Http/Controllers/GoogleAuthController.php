<?php

namespace App\Http\Controllers;

use Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google authenti
     * cation page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        // session変数に＄userを格納する
        return redirect('/start');
    }
}