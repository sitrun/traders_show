<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    /*public function rules(): array
    {
        return [
	        'name' => ['required', 'string', 'max:255'],
	        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
	        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }*/


	//Обработка атрибутов  - почему то не отрабатывает - не заменяет названия
	public function attributes() {

		return [
			'name ' => 'имя'
		];
	}


	//Обработка сообщений об ошибках
	public function messages( ){

		return [
			'name.required' => 'Поле имя является обязательным',
			'subject.required' => 'Поле тема является обязательным',
			'message.required' => 'Поле сообщение является обязательным',
			'email.required' => 'Поле email является обязательным'
		];
	}
}
