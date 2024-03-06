<x-guest-layout>
    <div class="wrap">
        @include('inc.header_menu')
1234
        <div class="center_wrap">
            <img src="{{ asset('storage/img/center_bg.png') }}" method='POST' alt="center_bg" class="img_center">
            <!-- Авторизация -->
            <form action="login" method="POST" class="form active" id="logIN">
                @csrf
                <div class="form_wrap">
                    <div class="form_text">
                        <p class="title">Войдите в аккаунт</p>
                        <p class="disc">Прекрасных сделок</p>
                    </div>
                    <div class="form_inputs">

                        <input type="text" name="email" placeholder="E-mail">
                        <input type="password" name="password" placeholder="Пароль" class="input_pass">
                    </div>
                    <div class="btns_auth">
                        <input type="submit"  value="Авторизоваться" class="auth">
                        <!-- <a href="#" class="forgot_pass">Забыли пароль?</a> -->
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
                    <a class="register_bottom" href="register">
                        Зарегистрировать новый аккаунт
                    </a>
                </div>

            </form>
        </div>

    </div>
    @include('inc.footer_scripts.footer_login_scripts')
</x-guest-layout>
