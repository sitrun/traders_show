<x-guest-layout>

    <x-slot name="target_styles">
        <link rel="stylesheet" href="{{ mix("css/app.css") }}">
        <link rel="stylesheet" href="{{ mix("css/auth_old.css") }}">
    </x-slot>

    <x-slot name="title">Сбросить пароль</x-slot>
    <div class="wrap">
        <x-menu></x-menu>
        <div class="center_wrap">
            <img src="{{ asset('storage/img/center_bg.png') }}" method='POST' alt="center_bg" class="img_center">
            <!-- Форма изменения пароля -->
            <form action="{{ route('password.store') }}" method="POST" class="form" id="reset_password">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="form_wrap">
                    <div class="form_text">
                        <p class="title">Задать новый пароль</p>
                        <p class="disc">Укажите новый пароль с подтверждением</p>
                    </div>

                    <div class="form_inputs">

                        <x-text-input-auth id="email" type="hidden" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <input type="password" name="password" placeholder="Пароль" class="input_pass">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <input type="password" name="password_confirmation" placeholder="Повторите пароль" class="input_pass input_repeat_pass">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    </div>
                    <div class="btns_auth">
                        <input type="submit" value="{{ __('Reset Password') }}" class="auth">
                        <a href="{{ route('password.request') }}" class="forgot_pass">{{ __('Repeat reset password email') }}</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
