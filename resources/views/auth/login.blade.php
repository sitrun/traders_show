<x-guest-layout>

    <x-slot name="target_styles">
        <link rel="stylesheet" href="{{ mix("css/app.css") }}">
        <link rel="stylesheet" href="{{ mix("css/auth_old.css") }}">
    </x-slot>

    <x-slot name="title">Авторизация на сайте</x-slot>

    <div class="wrap">
        <x-menu></x-menu>
        <div class="center_wrap">
            <img src="{{ asset('storage/img/center_bg.png') }}" method='POST' alt="center_bg" class="img_center">
            <!-- Авторизация -->
            <form action="{{ route('login') }}" method="POST" class="form active" id="logIN">
                @csrf
                <div class="form_wrap">
                    <div class="form_text">
                        <p class="title">Войдите в аккаунт</p>
                        <p class="disc">Прекрасных сделок</p>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                    </div>
                    <div class="form_inputs">

                        <input type="text" name="email" placeholder="E-mail">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <input type="password" name="password" placeholder="Пароль" class="input_pass">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="btns_auth">
                        <input type="submit"  value="Авторизоваться" class="auth">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot_pass">{{ __('Forgot your password?') }}</a>
                        @endif

                    </div>
                    <div class="auth_other">
                         <p class="title">Или войдите с помощью</p>
                        <div class="btns">
                            <a href="{{route('google_redirect')}}" class="google">
                                <img src="{{ asset('storage/img/Google.svg') }}" alt="google_btn" class="google_img">
                                <p class="title">Google</p>
                            </a>
                        </div>
                    </div>
                    <a class="register_bottom" href="register">
                        Зарегистрировать новый аккаунт
                    </a>
                </div>

            </form>
        </div>

    </div>
    <x-footer-scripts-login></x-footer-scripts-login>
</x-guest-layout>
