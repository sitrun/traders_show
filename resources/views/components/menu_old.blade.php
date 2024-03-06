<div {{$attributes->class(['header_main_page'=>true])}}>
            <div class="logo">
        <img src="{{ asset('storage/img/logo.png') }}" alt="logo" width="120" height="88">
    </div>
    <div class="m_links">
        <a href="{{route('home')}}" class="link">Главная</a>
        <a href="{{route('signals')}}" class="link">Сигналы</a>
        <a href="{{route('statistic')}}" class="link">Статистика</a>
        @auth
            <a href="{{route('calc')}}" class="link">Калькулятор</a>
        @endauth
        @guest
            <a href="{{route('home')}}" class="link">Калькулятор</a>
        @endguest
        <a href="#" class="link">Образование</a>

    </div>
    <div class="m_tg_lang_wrap">
        @guest
        <a href="https://t.me/my_traders" class="tg">
            <img src="{{ asset('storage/img/telegram.png') }}" alt="telegram">
        </a>
        <div class="lang">
            <p class="lang_text">Ru</p>
            <img src="{{ asset('storage/img/arrow_down.png') }}" alt="arrow_down" class="lang_img">
        </div>
        @endguest

        @auth
        <a href="https://t.me/ForPeoplePrivate_bot" class="tg">
            <img src="{{ asset('storage/img/telegram.png') }}" alt="telegram" width="24">
        </a>

        <a href="profile" class="profile_icon">
            <img src="{{ asset('storage/img/profile.png') }}" alt="profile" width="24">
        </a>

        <a href="logout" class="logout_icon">
            <img src="{{ asset('storage/img/logout.png') }}" alt="logout" width="24">
        </a>

        <div class="lang">
            <p class="lang_text">Ru</p>
            <img src="{{ asset('storage/img/arrow_down.png') }}" alt="arrow_down" class="lang_img">
        </div>

        @endauth

    </div>

</div>