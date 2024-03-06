<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ProfileUpdateOnesRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    //Обновление только email
	public function updateOnesEmail(ProfileUpdateOnesRequest $request)
	{
		if ($request->type_update == 'update_email') {
			//if ($request->type_update == 'update_email' and !is_null($request->email)) {

			if (is_null($request->email) or trim($request->email) == '') {
				return response()->json(['success' => true, 'data' => 'Данные не сохранены!', '_text' => 'Email не должен быть пустым', '_s' => "ok_".$request->type]);
			}

			$request->user()->email = $request->email;
			$request->user()->save();

			return response()->json(['success' => true, 'data' => 'Данные успешно сохранены', '_text' => 'Email изменен', '_s' => "ok_".$request->type]);
		}
		return "Fail updateOnes!! ";
	}

    //Обновление полей по отдельности
	public function updateOnes(Request $request)
	{
		if ($request->type_update == 'update_deposit') {

			if (is_null($request->deposit) or trim($request->deposit) == ''
			    or is_null($request->currency) or trim($request->currency) == ''
			    or is_null($request->def_save_order) or trim($request->def_save_order) == ''
			) {
				return response()->json(['success' => true, 'data' => 'Данные не сохраненны', '_text' => 'Данные не изменены!', '_s' => "ok_".$request->type]);
			}


			$request->user()->deposit = $request->deposit;
			$request->user()->currency = $request->currency;
			$request->user()->def_save_order = $request->def_save_order;
			//return $request->user();
			$request->user()->save();

			return response()->json(['success' => true, 'data' => 'Данные успешно сохранены', '_text' => 'Данные успешно сохранены', '_s' => "ok_".$request->type]);
		}

		if ($request->type_update == 'update_name') {

			if (is_null($request->name) or trim($request->name) == '') {
				return response()->json(['success' => true, 'data' => 'Данные не сохранены!', '_text' => 'Имя не должен быть пустым', '_s' => "ok_".$request->type]);
			}

			$request->user()->name = $request->name;
			$request->user()->save();

			return response()->json(['success' => true, 'data' => 'Данные успешно сохранены', '_text' => 'Имя изменено', '_s' => "ok_".$request->type]);
		}

		if ($request->type_update == 'update_notifications') {

			if (is_null($request->not_news) or trim($request->not_news) == ''
				or is_null($request->not_signals) or trim($request->not_signals) == ''
				or is_null($request->not_orders) or trim($request->not_orders) == ''
			) {
				return response()->json(['success' => true, 'data' => 'Данные не сохраненны', '_text' => 'Данные не изменены!', '_s' => "ok_".$request->type]);
			}

			$request->user()->not_news = $request->not_news;
			$request->user()->not_signals = $request->not_signals;
			$request->user()->not_orders = $request->not_orders;
			$request->user()->save();

			return response()->json(['success' => true, 'data' => 'Данные успешно сохранены', '_text' => 'Данные успешно сохранены', '_s' => "ok_".$request->type]);
		}
		//$request->user()->fill($request->validated());
//		$request->user()->save();
		return "Fail updateOnes!! ";
	}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


	//Display beta version
	public function edit_beta( Request $request ): View {

		return view('profile.beta.edit', [
			'user' => $request->user(),
			'date_birthday' => Carbon::parse($request->user()->birthday),
		]);
    }

	public function update_beta(Request $request)
	{

		if ($request->type_update == 'update_notifications') {

			return response()->json(['success' => true, '_text' => 'Обновление уведомлений']);
			if (is_null($request->not_news) or trim($request->not_news) == ''
			    or is_null($request->not_signals) or trim($request->not_signals) == ''
			    or is_null($request->not_orders) or trim($request->not_orders) == ''
			) {
				return response()->json(['success' => true, 'data' => 'Данные не сохраненны', '_text' => 'Данные не изменены!', '_s' => "ok_".$request->type]);
			}

			$request->user()->not_news = $request->not_news;
			$request->user()->not_signals = $request->not_signals;
			$request->user()->not_orders = $request->not_orders;
			$request->user()->save();

			return response()->json(['success' => true, 'data' => 'Данные успешно сохранены', '_text' => 'Данные успешно сохранены', '_s' => "ok_".$request->type]);
		}

		$validated = $request->validate([
			'name' => ['string', 'required', 'max:255'],
			'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($request->user()->id)],
			'family' => ['string', 'max:50'],
			'nick_name' => ['string', 'max:50'],
			'second_name' => ['string', 'max:50'],
			'birthday' => ['string', 'max:50'],
			'sex' => ['boolean'],
			'country' => ['string', 'max:50'],
			'city' => ['string', 'max:50'],
			'tel' => ['string', 'max:30'],
		]);
		$request->user()->fill($validated);

		//Собираем дату рождения
		$date_birthday =  $request->date_year .'-'. $request->date_month .'-'. $request->date_day;
		$carbon = Carbon::parse($date_birthday);

		if ($carbon) {
			$request->user()->birthday = $carbon->isoFormat('Y-M-D');
		}

		if ($request->user()->isDirty('email')) {
			$request->user()->email_verified_at = null;
		}

		$request->user()->save();

		$request_type = 'update_user';
		$message = 'Профиль успешно обновлен';

		//return Redirect::route('profile_beta.edit')->with('status', 'profile-updated');
		return response()->json(['success' => true, '_text' => $message, '_s' => 'ok_'.$request_type]);
	}
    
}
