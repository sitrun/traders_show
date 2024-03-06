<x-guest-layout>

    <x-slot name="target_styles">
        <link rel="stylesheet" href="{{ mix("css/app.css") }}">
        <link rel="stylesheet" href="{{ mix("css/auth_old.css") }}">
    </x-slot>

    <x-slot name="title">Забыли пароль?</x-slot>

    <div class="wrap">
        <x-menu></x-menu>
        <div class="center_wrap">
            <img src="{{ asset('storage/img/center_bg.png') }}" method='POST' alt="center_bg" class="img_center">
            <!-- Восстановление пароля -->
            <form action="{{ route('password.email') }}" method="POST" class="form active" id="password_email">
                @csrf
                <div class="form_wrap">
                    <div class="form_text">
                        <p class="title">Восстановить пароль</p>
                        <p class="disc">Хотите восстановить пароль?</p>
                    </div>
                    <div class="form_inputs">

                        <input type="text" name="email" placeholder="Укажите e-mail для восстановления пароля">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                    </div>
                    <div class="btns_auth">
                        <input type="submit"  value="Сбросить пароль" class="auth">
                        <a class="login_bottom" href="{{ route('login') }}">
                            {{ __('Sign in') }}
                        </a>
                    </div>
                    <div class="btns_auth">
                        <a class="register_bottom" href="{{ route('register') }}" style="margin-top: 1rem;">
                            Зарегистрировать новый аккаунт
                        </a>
                    </div>

                </div>

            </form>
        </div>

    </div>
</x-guest-layout>
