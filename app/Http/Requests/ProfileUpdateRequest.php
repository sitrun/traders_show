<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'required', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'family' => ['string', 'max:50'],
            'second_name' => ['string', 'max:50'],
            'birthday' => ['string', 'max:50'],
            'sex' => ['boolean'],
            'country' => ['string', 'max:50'],
            'city' => ['string', 'max:50'],
            'tel' => ['string', 'max:30'],
        ];
    }

	//Изменить названия полей
	public function attributes() {


		return [
			'name' => 'имя',
			'password' => 'пароль',
		];
    }
}
