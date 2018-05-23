<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Socialite;

use Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
////
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return array_add($request->only($this->username(), 'password'), 'verified', true);
    }



    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $github_user = Socialite::driver('github')->user();

        $user = $this->userFindOrCreate($github_user);

        Auth::login($user, true);

        return redirect($this->redirectTo);

    }

    /**
     * Find or create user
     *
     */
    public function userFindOrCreate($github_user){

        $user = User::where('provider_id', $github_user->id)->first();

        if(!$user){

            $user = new User;
            $user->name = $github_user->getNickname();
            $user->email = $github_user->getEmail();
            $user->provider_id = $github_user->getId();
            $user->verified = 1;

            $user->save();
        }

        return $user;


    }

}
