<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the providers authentication page.
     *
     * @param $provider string name of the provider
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle the callback from the provider when authentication was successful.
     *
     * @param $provider string name of the provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();

        $user = $this->getOrCreateUser($provider, $userSocial);

        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * Try to find a User that matches the given email address. Otherwise,
     * create a new one with the information from the provider
     *
     * @param $provider string name of the provider
     * @param $userSocial \Laravel\Socialite\Contracts\User
     * @return mixed
     */
    public function getOrCreateUser($provider, $userSocial)
    {
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        if (!$user) { // Create a new user
            $user = User::create([
                'name' => $this->buildName($userSocial, $provider),
                'email' => $userSocial->getEmail(),
                'image' => $userSocial->getAvatar(),
                'provider_id' => $userSocial->getId(),
                'provider' => $provider,
            ]);

            // When the new user is created, we can directly verify the email
            // address
            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }
        }

        return $user;
    }

    /**
     * Builds a meaningful name from the social user information
     *
     * @param $userSocial \Laravel\Socialite\Contracts\User
     * @param $provider string name of the provider
     * @return mixed
     */
    private function buildName($userSocial, $provider)
    {
        $result = $userSocial->getName();

        if (!$result && $provider=='github') {
            // Github has a special attribute: nickname
            $result = $userSocial->nickname;
        }

        if (!$result) {
            // Use email if nothing else is available
            $result = $userSocial->getEmail();
        }

        return $result;
    }

}
