<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::PROFILE);
        //return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


	/**
	 * Display the login view with google auth.
	 */
	public function create_beta(): View
	{
		return view('auth.beta.login');
	}

	//Login or registrate with google akk
	public function google_login(Request $request) {

		$googleUser = Socialite::driver( 'google' )->user();
		//$githubUser = Socialite::driver('github')->user();

		$user = User::where('email', $googleUser->email)->first();


		if ($user) {
			$user->update([
				'google_token' => $googleUser->token,
				'google_refresh_token' => $googleUser->refreshToken,
			]);
		} else {
			$user = User::create([
				'name' => $googleUser->name,
				'email' => $googleUser->email,
				'google_id' => $googleUser->id,
				'google_token' => $googleUser->token,
				'google_refresh_token' => $googleUser->refreshToken,
				'password' => encrypt(Str::random(20)),
			]);
			$user->assignRole('user');
		}

		Auth::login($user);

//		return redirect('/dashboard');

//		$request->authenticate();

		$request->session()->regenerate();

		return redirect()->intended(RouteServiceProvider::PROFILE);
	}

}
