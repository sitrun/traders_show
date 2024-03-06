<x-app-layout>

    <x-slot name="target_styles">
        <link rel="stylesheet" href="{{ mix("css/article_main.css") }}">
        <link rel="stylesheet" href="{{ mix("css/create_article.css") }}">
    </x-slot>
    <x-slot name="title"> | Редактирование статьи</x-slot>


    <!-- Модальные окна -->
    <x-post-components.modals></x-post-components.modals>

    <!-- Контент -->
    <div class="content_wrap">
        <div class="nav">
            <p>Главная</p>
            <img src="{{ asset('storage/img/arrow_right.png') }}" alt="arrow">
            <p>Блог</p>
            <img src="{{ asset('storage/img/arrow_right.png') }}" alt="arrow">
            <p id="nav_active_top">Публикации</p>
        </div>

        <div class="center_content">
            <div class="left">
                <img src="{{ asset('storage/img/avatar_old.png') }}" alt="avatar">
                <p class="name">
                    Ivan777
                </p>
                <div class="subsribe">
                    13 Подписчиков
                </div>
                <div class="bottom_block">
                    <div class="line">
                        <p class="title">
                            Просмотры
                        </p>
                        <div class="dis">
                            1 292
                        </div>
                    </div>
                    <div class="line">
                        <p class="title">
                            Лайки
                        </p>
                        <div class="dis">
                            69
                        </div>
                    </div>
                    <div class="line">
                        <p class="title">
                            Комментарии
                        </p>
                        <div class="dis">
                            32
                        </div>
                    </div>
                </div>
            </div>

            <div class="right">
                <div class="head">
                    <p class="title">
                        Публикации
                    </p>
                    <div class="start_create">
                        <div class="title" onclick="show_disable_modal('modal_head')">
                            Создать
                        </div>
                        <div id="modal_head">
                            <div class="item">Написать новость</div>
                            <div class="item" onclick="open_modal('modal_create_article')">Написать статью</div>
                            <div class="item">Написать урок</div>
                        </div>
                    </div>
                </div>
                <div class="filters">
                    <div class="left">
                        <div class="item">
                            <p class="text">Опубликованные</p>
                            <p class="count">3</p>
                        </div>
                        <div class="item">
                            <p class="text">Ожидают публикации</p>
                            <p class="count">2</p>
                        </div>
                        <div class="item">
                            <p class="text">Черновики</p>
                            <p class="count">1</p>
                        </div>
                    </div>

                    <div class="search">
                        <input type="text" placeholder="Поиск публикации">
                        <img src="{{ asset('storage/img/search.png') }}" alt="search">
                    </div>

                </div>


                <!-- ЕСЛИ НЕТ СТАТЕЙ -->
                <div class="empty active">
                    <p class="title">Опубликуйте один из ваших черновиков или создайте новую публикацию</p>
                    <div class="start_create" onclick="show_disable_modal('modal_empty')">Создать</div>

                    <div id="modal_empty">
                        <div class="item">Написать новость</div>
                        <div class="item" onclick="open_modal('modal_create_article')">Написать статью</div>
                        <div class="item">Написать урок</div>
                    </div>
                </div>


                <!-- ОТОБРАЖЕНИЕ СТРАТЕЙ -->
                <div class="have_articles disactive">
                    <div class="item">
                        <div class="top">
                            <img src="{{ asset('storage/img/article_1.png') }}" alt="article">
                            <div class="btns_wrap">
                                <div class="date">Сегодня</div>
                                <div class="dots_wrap">
                                    <img src="{{ asset('storage/img/dots_more.png') }}" alt="dots">
                                </div>

                            </div>

                        </div>
                        <div class="market">Крипторынок</div>
                        <div class="title">Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора</div>
                        <div class="dis">Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора</div>

                        <div class="bottom">
                            <div class="item_bottom">
                                <img src="{{ asset('storage/img/glass.png') }}" alt="glass">
                                <p class="dis">345</p>
                            </div>

                            <div class="item_bottom">
                                <img src="{{ asset('storage/img/class.png') }}" alt="class">
                                <p class="dis">34</p>
                            </div>

                            <div class="item_bottom">
                                <img src="{{ asset('storage/img/comment.png') }}" alt="comment">
                                <p class="dis">3</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="top">
                            <img src="{{ asset('storage/img/article_1.png') }}" alt="article">
                            <div class="btns_wrap">
                                <div class="date">Сегодня</div>
                                <div class="dots_wrap">
                                    <img src="{{ asset('storage/img/dots_more.png') }}" alt="dots">
                                </div>

                            </div>

                        </div>
                        <div class="market">Крипторынок</div>
                        <div class="title">Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора</div>
                        <div class="dis">Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора</div>

                        <div class="bottom">
                            <div class="item_bottom">
                                <img src="{{ asset('storage/img/glass.png') }}" alt="glass">
                                <p class="dis">345</p>
                            </div>

                            <div class="item_bottom">
                                <img src="{{ asset('storage/img/class.png') }}" alt="class">
                                <p class="dis">34</p>
                            </div>

                            <div class="item_bottom">
                                <img src="{{ asset('storage/img/comment.png') }}" alt="comment">
                                <p class="dis">3</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="top">
                            <img src="{{ asset('storage/img/article_1.png') }}" alt="article">
                            <div class="btns_wrap">
                                <div class="date">Сегодня</div>
                                <div class="dots_wrap">
                                    <img src="{{ asset('storage/img/dots_more.png') }}" alt="dots">
                                </div>

                            </div>

                        </div>
                        <div class="market">Крипторынок</div>
                        <div class="title">Автор «Стандарта биткоинов» стал советником BTC-офиса Сальвадора</div>
                        <div class="dis">Сейфедин Аммус, автор книги «Стандарт биткоинов», назначен экономическим советником Национального биткоин-офиса Сальвадора</div>

                        <div class="bottom">
                            <div class="item_bottom">
                                <img src="{{ asset('storage/img/glass.png') }}" alt="glass">
                                <p class="dis">345</p>
                            </div>

                            <div class="item_bottom">
                                <img src="{{ asset('storage/img/class.png') }}" alt="class">
                                <p class="dis">34</p>
                            </div>

                            <div class="item_bottom">
                                <img src="{{ asset('storage/img/comment.png') }}" alt="comment">
                                <p class="dis">3</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Скрипты -->
    <x-post-components.edit-post-scripts></x-post-components.edit-post-scripts>

    <x-footer-view></x-footer-view>
</x-app-layout>