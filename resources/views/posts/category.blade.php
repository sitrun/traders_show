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
            <p class="black_text">{{$category_current->name_cat}}</p>
        </div>

        <!-- Заголовок-->
        <div class="content_head">
            <div class="title">{{$category_current->name_cat}}</div>

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
            @php
                //echo 'кол-во постов ' . $show_posts->count();
                //$show_posts->dump();
                //dd($show_posts->first());
                //dd($show_posts->get());
            @endphp
            @forelse ($show_posts->get() as $p)
                <a href="{{route('post', $p->id)}}" class="item">
                    <div class="top" style="width: 100%; height: 170px; border-radius: 10px; margin: 0 0 12px 0; overflow: hidden; position: relative;">
                        <img style="position: absolute; width: 100%; height: 100%; object-fit: cover; top: 50%; left: 50%; transform: translate(-50%, -50%);"
                             src="{{ $p->getMedia('post_cover_image')[0]->getUrl() }}" alt="article {{$p->id}}">
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
                        {{$p->post_name}}
                    </div>
                    <div class="dis">
                        {!! Illuminate\Support\Str::limit(strip_tags($p->content, 112)) !!}
                    </div>
                </a>
            @empty
                <p style="font-size: x-large; margin-top: 5rem; text-align: center; font-weight: bold;">
                    Посты еще не написаны</p>
            @endforelse

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