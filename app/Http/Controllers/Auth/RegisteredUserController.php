<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Http\Requests\Auth\RegisterRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
//    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'date_register' => Carbon::now(),
//            'id_telegram' => 0,
//            'deposit' => '0',
//            'count_update_dep' => 0,
//            'date_register' => '',
//            'currency' => 'RUB',
//            'balance' => '0',
//            'not_news' => $request->email,
//            'not_signals' => $request->email,
//            'not_orders' => $request->email,
//            'def_save_order' => $request->email,
//            'type_trade' => $request->email,

            'password' => Hash::make($request->password),
        ]);

		//Назначаеем роль обычного пользователя
		$user->assignRole('user');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
