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

        $arleady = $shukkinbow
            ->where('google_id', $user->getId())
            ->first();

        //shukkinbowにユーザ情報を追加
        if (empty($arleady)) {
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
        }

        //他の場所でdbからユーザ情報を取り出すためにid保存
        $google_id = session()->get('google_id', []);
        $google_id[] = $user->getId();
        session()->put('google_id', $google_id);

        return redirect('/start');
    }
}