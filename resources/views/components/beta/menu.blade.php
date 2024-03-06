<div {{$attributes->class(['header'=>true])}}>
    <div class="header_center_wrap">
        <div class="logo">
            <img src="{{ asset('storage/img/logo.png') }}" alt="logo">
        </div>

        <div class="nav">
            <a href="{{route('home')}}">Главная</a>
            <a href="{{route('signals')}}">Сигналы</a>
            <a href="{{route('statistic')}}">Статистика</a>
            @auth
                <a href="{{route('calc')}}">Калькулятор</a>
            @endauth
            @guest
                <a href="{{route('home')}}">Калькулятор</a>
            @endguest
            <a href="{{route('post_category', 'education')}}">Образование</a>

            <div class="mobile_btn">
                <img src="{{ asset('storage/img/icon_tg.png') }}" alt="tg">
                <img src="{{ asset('storage/img/icon_language.png') }}" alt="lang">
                <a href="index.html"><img src="{{ asset('storage/img/icon_profile.png') }}" alt="profile"></a>
                <img src="{{ asset('storage/img/icon_exit.png') }}" alt="exit">
            </div>

        </div>
        <div class="right_btns">
            <div class="item">
                <a href="https://t.me/my_traders" class="tg">
                    <img class="icon_tg" src="{{ asset('storage/img/icon_tg.png') }}" alt="tg">
                </a>
                <img src="{{ asset('storage/img/icon_language.png') }}" alt="language">
            </div>

            @auth
                <div class="item_2">
                    <a href="profile" class="profile">
                        <img src="{{ asset('storage/img/icon_profile.png') }}" alt="profile">
                    </a>
                    <a href="logout">
                        <img src="{{ asset('storage/img/icon_exit.png') }}" alt="exit">
                    </a>
                </div>
            @endauth

            <div class="burger" onclick="tongle_burger('open')">
                <img src="{{ asset('storage/img/burger_menu.png') }}" alt="burger menu">
            </div>

            <div class="burger_close" onclick="tongle_burger('close')">
                <img src="{{ asset('storage/img/burber_close.png') }}" alt="burger menu">
            </div>


        </div>
    </div>

</div>