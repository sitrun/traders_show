<x-app-layout>

    <x-slot name="target_styles">
        <link rel="stylesheet" href="{{ mix("css/education.css") }}">
    </x-slot>
    <x-slot name="title">{{$category_current->name_cat ?? 'По умолчанию'}}</x-slot>

    <!-- Контент -->
    <div class="content_wrap">
        <div class="top_nav">
            <p>Главная</p>
            <img src="{{ asset('storage/img/arrow_right.png') }}" alt="arrow">
            <p class="black_text">Образование</p>
        </div>

        <!-- Заголовок-->
        <div class="content_head">
            <div class="title">Образование</div>

            <div class="right_btns">
                <div class="btns_wrap">
                    <div class="item">
                        Все
                    </div>
                    <div class="item">
                        Акции РФ
                    </div>
                    <div class="item">
                        Крипторынок
                    </div>
                    <div class="item">
                        Валютный
                    </div>

                </div>

                <div class="like">
                    <i class="fa-solid fa-heart"></i>
                </div>

            </div>
        </div>

        <!-- Карточки статей -->
        <div class="articles_wrap">
            <a href="{{route('post', '1')}}" class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_2.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_1.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_3.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_4.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_5.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_6.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_7.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_8.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_9.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_10.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_11.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>

            <a class="item">
                <div class="top">
                    <img src="{{ asset('storage/img/article_12.png') }}" alt="article 1">

                    <div class="btns_wrap">
                        <div class="title_new">
                            NEW
                        </div>
                        <div class="like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>

                </div>

                <div class="market">
                    Крипторынок
                </div>

                <div class="title">
                    Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора
                </div>
                <div class="dis">
                    Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора
                </div>
            </a>
        </div>

        <!-- Нижняя часть -->
        <div class="bottom_wrap">
            <div class="first">
                <div class="title">Котировка валют на сегодня</div>
                <div class="line">
                    <p class="paire">
                        USD/RUR
                    </p>
                    <p class="price">
                        0.6609
                    </p>
                    <div class="percent red">
                        -0.0001
                    </div>
                </div>
                <div class="line">
                    <p class="paire">
                        EUR/RUR
                    </p>
                    <p class="price">
                        0.6609
                    </p>
                    <div class="percent green">
                        +0.0001
                    </div>
                </div>
                <div class="line">
                    <p class="paire">
                        EUR/USD
                    </p>
                    <p class="price">
                        0.6609
                    </p>
                    <div class="percent green">
                        +0.0001
                    </div>
                </div>
                <div class="line">
                    <p class="paire">
                        GBP/USD
                    </p>
                    <p class="price">
                        0.6609
                    </p>
                    <div class="percent green">
                        +0.0001
                    </div>
                </div>
            </div>

            <div class="second">
                <div class="title">
                    Только что прошла сделка
                </div>
                <div class="line">
                    <div class="paire">
                        BTC/USDT
                    </div>
                    <div class="price">
                        150 $
                    </div>

                    <div class="profit">
                        Profit 3 к 1
                    </div>
                </div>
                <div class="line">
                    <div class="paire">
                        BTC/USDT
                    </div>
                    <div class="price">
                        150 $
                    </div>

                    <div class="profit">
                        Profit 3 к 1
                    </div>
                </div>

                <a href="" class="btn">
                    Перейти к сделкам
                </a>
            </div>

            <div class="third">
                <div class="title">
                    Курсы на товарных биржах
                </div>
                <div class="line">
                    <div class="name">
                        Нефть Brent
                    </div>
                    <div class="price">
                        N/A
                    </div>
                    <div class="percent">
                        0.00
                    </div>
                </div>
                <div class="line">
                    <div class="name">
                        Нефть WTI
                    </div>
                    <div class="price">
                        N/A
                    </div>
                    <div class="percent">
                        0.00
                    </div>
                </div>
                <div class="line">
                    <div class="name">
                        Бензин
                    </div>
                    <div class="price">
                        N/A
                    </div>
                    <div class="percent">
                        0.00
                    </div>
                </div>
                <div class="line">
                    <div class="name">
                        Газ
                    </div>
                    <div class="price">
                        N/A
                    </div>
                    <div class="percent">
                        0.00
                    </div>
                </div>
            </div>

        </div>
    </div>



    <x-footer-view></x-footer-view>
</x-app-layout>