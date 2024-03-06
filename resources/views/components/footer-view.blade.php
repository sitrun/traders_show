<div class="footer">
    <div class="footer_center_wrap">
        <div class="first_wrap">
            <div class="logo">
                <img src="{{ asset('storage/img/logo.png') }}" alt="logo">
            </div>
            <div class="nav">
                <a href="{{route('home')}}" class="link">Главная</a>
                <a href="{{route('signals')}}" class="link">Сигналы</a>
                <a href="{{route('statistic')}}" class="link">Статистика</a>
                @auth
                    <a href="{{route('calc')}}" class="link">Калькулятор</a>
                @endauth
                @guest
                    <a href="{{route('home')}}" class="link">Калькулятор</a>
                @endguest
                <a href="{{route('post_category', 'education')}}" class="link">Образование</a>
            </div>
            <div class="right_btns">
                <div class="item">
                    <img class="icon_tg" src="{{ asset('storage/img/icon_tg.png') }}" alt="tg">
                    <img src="{{ asset('storage/img/icon_language.png') }}" alt="langiage">
                </div>
                <div class="item_2">
                    <img src="{{ asset('storage/img/icon_profile.png') }}" alt="profile">
                    <img src="{{ asset('storage/img/icon_exit.png') }}" alt="exit">
                </div>
            </div>
        </div>

        <div class="second_wrap">
            <p class="left_text">
                Предоставленные материалы на портале my-traders.com не несут инвестиционный характер и не призывают к действиям.
            </p>
            <div class="right_text">
                <a href="">Условия использования</a>
                <a href="">Политика конфиденциальности</a>
            </div>
        </div>
    </div>


</div>