<?php

namespace App\Http\Controllers;
use Socialite;
use App\Service\GoogleAuthService;
use App\Service\AttendanceService;

class GoogleAuthController extends Controller
{
    public $google;
    public $attendance;

    public function __construct(GoogleAuthService $google,AttendanceService $attendance){
        $this->google = $google;
        $this->attendance = $attendance;
    }

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
        $gmail_user = Socialite::driver('google')->user();
        $this->google->addUser($gmail_user);
        $this->google->setGoogleId($gmail_user);
        $this->attendance->takeOverCount();

        return redirect('start');
    }
}