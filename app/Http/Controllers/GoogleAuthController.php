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
    public function handleProviderCallback(t_user $shukkinbow_user)
    {
        $user = Socialite::driver('google')->user();

        $arleady = $shukkinbow_user
            ->where('google_id', $user->getId())
            ->first();

        //shukkinbowにユーザ情報を追加
        if (empty($arleady)) {
            $shukkinbow_user->torken = $user->token;
            $shukkinbow_user->refreshtoken = $user->refreshToken;
            $shukkinbow_user->expiresin = $user->expiresIn;
            $shukkinbow_user->google_id = $user->getId();
            $shukkinbow_user->nickname = $user->getNickname();
            $shukkinbow_user->name = $user->getName();
            $shukkinbow_user->email = $user->getEmail();
            $shukkinbow_user->avatar = $user->getAvatar();
            $shukkinbow_user->company_id = 1;
            $shukkinbow_user->save();
        }

        //他の場所でdbからユーザ情報を取り出すためにid保存
        session()->forget('google_id');
        $google_id = session()->get('google_id', []);
        $google_id[] = $user->getId();
        session()->put('google_id', $google_id);

        return redirect('/start');
    }
}