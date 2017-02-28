<?php

namespace App\Http\Controllers;
use Socialite;
use App\t_user;

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
    public function handleProviderCallback(t_user $shukkinbow)
    {
        $user = Socialite::driver('google')->user();

        $shukkinbow->torken = $user->token;
        $shukkinbow->refreshtoken = $user->refreshToken;
        $shukkinbow->expiresin = $user->expiresIn;
        $shukkinbow->google_id = $user->getId();
        $shukkinbow->nickname = $user->getNickname();
        $shukkinbow->name = $user->getName();
        $shukkinbow->email = $user->getEmail();
        $shukkinbow->avatar = $user->getAvatar();
        $shukkinbow->company_id = 1;
        $shukkinbow->save();

        return redirect('/start');
    }
}