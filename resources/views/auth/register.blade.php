<x-guest-layout>

    <x-slot name="target_styles">
        <link rel="stylesheet" href="{{ mix("css/app.css") }}">
        <link rel="stylesheet" href="{{ mix("css/auth_old.css") }}">
    </x-slot>

    <x-slot name="title">Регистрация на сайте</x-slot>

    <div class="wrap">
        <x-menu></x-menu>
        <div class="center_wrap">
            <img src="{{ asset('storage/img/center_bg.png') }}" method='POST' alt="center_bg" class="img_center">
            <!-- Регистрация -->
            <form action="{{ route('register') }}" method="POST" class="form" id="singUP">
                @csrf
                <div class="form_wrap">
                    <div class="form_text">
                        <p class="title">Зарегистрировать новый аккаунт</p>
                        <p class="disc">Прямо сейчас присоединяетесь в самую удобную финансовую платформу для торговли</p>
                    </div>

                    <div class="form_inputs">

                        <input type="text" name="name" placeholder="Имя" class="input_name" value="{{ old('name') }}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <input type="password" name="password" placeholder="Пароль" class="input_pass" value="{{ old('password') }}">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <input type="password" name="password_confirmation" placeholder="Повторите пароль" class="input_pass input_repeat_pass" value="{{ old('password_confirmation') }}">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    </div>
                    <div class="btns_auth">
                        <input type="submit" value="{{ __('Register') }}" class="auth">
                        <a href="{{ route('password.request') }}" class="forgot_pass">{{ __('Forgot your password?') }}</a>
                    </div>
                    <div class="auth_other">
                        <!-- <p class="title">Или войдите с помощью</p>
                        <div class="btns">
                            <a href="#" class="google">
                                <img src="{{ asset('storage/img/Google.svg') }}" alt="google_btn" class="google_img">
                                <p class="title">Google</p>
                            </a>
                        </div> -->
                    </div>
                    <a class="login_bottom" href="{{ route('login') }}">
                        {{ __('Sign in') }}
                    </a>
                </div>

            </form>
        </div>
    </div>
    <x-footer-scripts-register></x-footer-scripts-register>
</x-guest-layout>
