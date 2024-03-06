<x-app-layout>

    <x-slot name="target_styles">
        <link rel="stylesheet" href="{{ mix("css/app.css") }}">
    </x-slot>

    <x-slot name="title">Дашбоард</x-slot>


    <div class="content_wrap">
        <div class="nav">
            <p>Главная</p>
            <img src="{{ asset('storage/img/arrow_right.png') }}" alt="arrow">
            <p>Профиль</p>
            <img src="{{ asset('storage/img/arrow_right.png') }}" alt="arrow">
            <p id="nav_active_top">Дашборд</p>
        </div>

        <div class="center_content">
            <div class="nav_left_wrap">
                <div class="burger_wrap">
                    <div class="burger_submenu" onclick="togle_berger_subnav('open')">
                        <img src="{{ asset('storage/img/burger_menu.png') }}" alt="burger">
                    </div>
                    <div class="burger_close_submenu" onclick="togle_berger_subnav('close')">
                        <img src="{{ asset('storage/img/burber_close.png') }}" alt="burger">
                    </div>
                </div>


                <div class="nav_left">
                    <div class="item" >
                        <div class="wrap_title" onclick="open_page('page_dashboard')">
                            <p class="title nav_active"  id="nav_left_dashboard">Дашборд</p>
                        </div>

                    </div>

                    <div class="item">
                        <div class="wrap_title" onclick="open_submenu('submenu_buy')">
                            <p class="title">Покупки</p>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="submenu" id="submenu_buy" >
                            <div class="title" id="nav_left_subscribe" onclick="open_page('page_subscribe')">
                                Подписки
                            </div>
                            <div class="title" id='nav_left_notifications' onclick="open_page('page_notifications')">
                                Уведомления
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="wrap_title" onclick="open_page('page_userinfo')">
                            <p class="title" id="nav_left_userinfo">Личная информация</p>
                        </div>

                    </div>

                    <div class="item">
                        <div class="wrap_title" onclick="open_submenu('submenu_trader')">
                            <p class="title">Трейдер</p>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="submenu" id="submenu_trader">
                            <div class="title" id ='nav_left_trader_register' onclick="open_page('page_trader_register')">
                                Регистрация трейдера
                            </div>
                            <div class="title" id='nav_left_trader_sells' onclick="open_page('page_trader_sells')">
                                Мои продажи
                            </div>
                            <div class="title" id='nav_left_trader_subscribe' onclick="open_page('page_trader_subscribe')">
                                Подписчики
                            </div>
                            <div class="title" id="nav_left_trader_forecasts" onclick="open_page('page_trader_forecasts')">
                                Текущие прогнозы
                            </div>
                            <div class="title" id="nav_left_trader_signals" onclick="open_page('page_trader_signals')">
                                Сигналы
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="wrap_title" onclick="open_page('page_finance')">
                            <p class="title" id='nav_left_finance'>Финансы</p>
                        </div>

                    </div>
                    <div class="item">
                        <div class="wrap_title" onclick="open_page('page_settings_calc')">
                            <p class="title" id="nav_left_settings_calc">Настройки калькулятора</p>
                        </div>

                    </div>

                    <div class="item">
                        <div class="wrap_title"  onclick="open_submenu('submenu_ref')">
                            <p class="title">Реферальная программа</p>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="submenu" id="submenu_ref">
                            <div class="title" id="nav_left_ref_programm_submenu" onclick="open_page('page_ref_programm_submenu')">
                                Реферальная программа
                            </div>
                            <div class="title" id='nav_left_ref_programm_team' onclick="open_page('page_ref_programm_team')">
                                Команда
                            </div>

                        </div>
                    </div>

                    <div class="item">
                        <div class="wrap_title" onclick="open_page('page_tarifs')">
                            <p class="title" id='nav_left_tarifs'>Тарифы</p>
                        </div>

                    </div>

                    <div class="item">
                        <div class="wrap_title" onclick="display_modal('modal_exit')">

                            <input type="submit" value="Выход" class="title">
                        </div>

                    </div>

                </div>
            </div>

            <div class="right_content">
                @if (session('status') === 'profile-updated')
                    <p>Ваш профиль успешно обновлен!</p>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <p>Ошибки валидации</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Дашборд -->
                <div id="page_dashboard" class="profile_page">
                    <div class="first_block">
                        <div class="midle">
                            <div class="wrap_title">
                                <div class="title mobile_title">
                                    <p>Дашборд</p>
                                </div>

                                <div class="right_btns">
                                    <a href="" class="deposit">Пополнить баланс</a>
                                    <a href="" class="windraw">Вывести</a>
                                </div>
                            </div>
                            <div class="items_wrap">
                                <!-- ДЛЯ ПК версии -->
                                <div class="line">
                                    <div class="item">
                                        <p class="title">Оборот сегодня:</p>
                                        <p class="dis">0 ₽</p>
                                    </div>
                                    <div class="item">
                                        <p class="title">Доход сегодня:</p>
                                        <p class="dis">0 ₽</p>
                                    </div>
                                    <div class="item">
                                        <p class="title">Средний чек:</p>
                                        <p class="dis">0 ₽</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="item">
                                        <p class="title">Покупателей сегодня:</p>
                                        <p class="dis">0</p>
                                    </div>
                                    <div class="item">
                                        <p class="title">Повторные покупки:</p>
                                        <p class="dis">0</p>
                                    </div>
                                    <div class="item">
                                        <p class="title">Всего клиентов:</p>
                                        <p class="dis">0 </p>
                                    </div>
                                </div>

                                <div class="last_line">
                                    <div class="item">
                                        <p class="title">Текущий баланс:</p>
                                        <p class="dis">0 ₽</p>
                                    </div>
                                    <div class="item">
                                        <p class="title">Всего заработано:</p>
                                        <p class="dis">0 ₽</p>
                                    </div>
                                </div>

                                <!-- МОБИЛЬНАЯ ВЕРСИЯ -->
                                <div class="line_mobile">
                                    <p class="title">Оборот сегодня:</p>
                                    <p class="dis">0 ₽</p>
                                </div>

                                <div class="line_mobile">
                                    <p class="title">Доход сегодня:</p>
                                    <p class="dis">0 ₽</p>
                                </div>
                                <div class="line_mobile">
                                    <p class="title">Средний чек:</p>
                                    <p class="dis">0 ₽</p>
                                </div>
                                <div class="line_mobile">
                                    <p class="title">Всего клиентов:</p>
                                    <p class="dis">0 </p>
                                </div>

                                <div class="line_mobile">
                                    <p class="title">Повторные покупки:</p>
                                    <p class="dis">0</p>
                                </div>
                                <div class="line_mobile">
                                    <p class="title">Покупателей сегодня:</p>
                                    <p class="dis">0</p>
                                </div>
                                <div class="line_mobile">
                                    <p class="title">Текущий баланс:</p>
                                    <p class="dis">0 ₽</p>
                                </div>
                                <div class="line_mobile">
                                    <p class="title">Всего заработано:</p>
                                    <p class="dis">0 ₽</p>
                                </div>

                            </div>
                        </div>
                        <div class="right">
                            <p class="date">13.06.2023</p>
                            <p class="dis">Дата завершення тарифа</p>
                            <a href="" class="btn_tarif">Выбрать тариф</a>
                        </div>
                    </div>

                    <div class="ref_programm">
                        <p class="title">Реферальная программа</p>
                        <p class="discription">Построй свою бесконечную команду трейдеров по всему миру</p>

                        <div class="links_wrap">
                            <div class="left">
                                <p class="title">Ваша реферальная ссылка:</p>
                                <div class="ref_link_wrap">
                                    <input name='ref_code' type="text" value="http://my-traders.com/your_team">
                                    <img src="{{ asset('storage/img/copy.png') }}" alt="copy referal link" onclick="copy_buffer()">
                                </div>
                            </div>
                            <div class="right">
                                <div class="title">Рассказать друзьям</div>
                                <div class="contacts">
                                    <img src="{{ asset('storage/img/icon_tg.png') }}" alt="telegramm">
                                    <img src="{{ asset('storage/img/whatsApp.png') }}" alt="whatsapp">
                                    <img src="{{ asset('storage/img/mail_ru.png') }}" alt="mail.ru">
                                </div>
                            </div>
                        </div>


                    </div>


                </div>

                <!-- Подписки -->
                <div id="page_subscribe" class="profile_page">
                    <div class="mobile_title">
                        <p class="title">Подписки</p>
                    </div>
                    <div class="table_wrap">
                        <table >
                            <thead>
                            <tr>
                                <td class="head_text">
                                    Дата покупки
                                </td>
                                <td class="head_text">
                                    Трейдер
                                </td>
                                <td class="head_text">
                                    Цена
                                </td>
                                <td class="head_text">
                                    Дата окончания
                                </td>
                                <td class="head_text">
                                    Осталось дней
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    01.02.2023
                                </td>
                                <td>
                                    Трейдер
                                </td>
                                <td>
                                    $50
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                                <td>
                                    3 дня
                                </td>
                            </tr>

                            <tr class="gray_tr">
                                <td>
                                    01.02.2023
                                </td>
                                <td>
                                    Трейдер
                                </td>
                                <td>
                                    $50
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                                <td>
                                    3 дня
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Уведомления -->
                @include('profile.beta.partials.user-notifications')


                <!-- Личная информация -->
                @include('profile.beta.partials.update-user-form')

                <!-- Регистрация трейдера -->
                <div id="page_trader_register" class="profile_page">
                    <div class="left">
                        <form action="POST">
                            <div class="title mobile_title">Регистрация трейдера</div>
                            <div class="line">
                                <img src="{{ asset('storage/img/avatar.png') }}" alt="avatar">
                                <p class="dis">Загрузить<br>аватар</p>
                            </div>
                            <div class="line">
                                <p class="dis">Методы<br class="mobile_br"> анализа <br class='pc_br'>рынка:</p>
                                <div class="checkboxes_wrap">
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="fundament" name="fundament">

                                        <label for="fundament"><span class="pc_label"> Фундаментальный анализ</span></label>
                                        <p class="mobile_label">Фундаментальный анализ</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox" id="aligator" name="aligator">
                                        <label for="aligator"><span class="pc_label"></span></label>
                                        <p class="mobile_label">Аллигатор</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="bollengher" name="bollengher">
                                        <label for="bollengher"><span class="pc_label">Боллинджер</span></label>
                                        <p class="mobile_label">Боллинджер</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="fibonachi" name="fibonachi">
                                        <label for="fibonachi"><span class="pc_label">Фибоначчи</span></label>
                                        <p class="mobile_label">Фибоначчи</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="ema" name="ema">
                                        <label for="ema"><span class="pc_label">Скользящие средние</span></label>
                                        <p class="mobile_label">Скользящие средние</p>
                                    </div>
                                </div>
                            </div>
                            <div class="line">
                                <p class="dis">Период<br class="mobile_br"> торговли:</p>
                                <div class="checkboxes_wrap">
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="sredne" name="sredne">
                                        <label for="sredne"><span class="pc_label">Среднесрочный</span></label>
                                        <p class="mobile_label">Среднесрочный</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="cratko" name="cratko">
                                        <label for="cratko"><span class="pc_label">Краткосрочный</span></label>
                                        <p class="mobile_label">Краткосрочный</p>
                                    </div>
                                </div>
                            </div>
                            <div class="line">
                                <p class="dis">На каком<br>таймфрейме<br>торгуете:</p>
                                <div class="checkboxes_wrap">
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="1m" name="1m">
                                        <label for="1m"><span class="pc_label">1 минута</span></label>
                                        <p class="mobile_label">1 минута</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox" id="5m" name="5m">
                                        <label for="5m"><span class="pc_label">5 минут</span></label>
                                        <p class="mobile_label">5 минут</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="15m" name="15m">
                                        <label for="15m"><span class="pc_label">15 минут</span></label>
                                        <p class="mobile_label">15 минут</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="30m" name="30m">
                                        <label for="30m"><span class="pc_label">30 минут</span></label>
                                        <p class="mobile_label">30 минут</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="1h" name="1h">
                                        <label for="1h"><span class="pc_label">1 час</span></label>
                                        <p class="mobile_label">1 час</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="4h" name="4h">
                                        <label for="4h"><span class="pc_label">4 часа</span></label>
                                        <p class="mobile_label">4 часа</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox" id="1d" name="1d">
                                        <label for="1d"><span class="pc_label">Дневной</span></label>
                                        <p class="mobile_label">Дневной</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="1w" name="1w">
                                        <label for="1w"><span class="pc_label">Недельный</span></label>
                                        <p class="mobile_label">Недельный</p>
                                    </div>
                                    <div id="checkboxes" class="update_profile_active_block">
                                        <input type="checkbox"  id="1month" name="1month">
                                        <label for="1month"><span class="pc_label">Месячный</span></label>
                                        <p class="mobile_label">Месячный</p>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Сохранить"  class="save_btn">

                        </form>

                    </div>
                    <div class="right">
                        <p class="title">Ответьте на 20 вопросов и <br> </p>
                        <p class="green">получите статус «Трейдер»</p>
                        <p class="dis">После получения статуса «Трейдер» вы получите возможность делиться сигналами и зарабатывать на этом</p>
                        <a href="" class="start_test">Пройти тест</a>
                    </div>
                </div>

                <!-- Мои продажи -->
                <div id="page_trader_sells" class="profile_page">
                    <div class="head_title">
                        <p class="title mobile_title">Мои продажи</p>
                        <div class="right">
                            <div class="item">
                                <p class="black">Сумма платежа:</p>
                                <p class="green">$12</p>
                            </div>
                            <div class="item">
                                <p class="black">Оплаченный:</p>
                                <p class="green">$12</p>
                            </div>
                            <div class="item">
                                <p class="black">Баланс:</p>
                                <p class="green">$12</p>
                            </div>
                            <a href="" class="windraw">Вывод средств</a>
                        </div>
                    </div>
                    <div class="table_wrap">
                        <div class="mobile_right">
                            <div class="item">
                                <p class="black">Сумма платежа:</p>
                                <p class="green">$12</p>
                            </div>
                            <div class="item">
                                <p class="black">Оплаченный:</p>
                                <p class="green">$12</p>
                            </div>
                            <div class="item">
                                <p class="black">Баланс:</p>
                                <p class="green">$12</p>
                            </div>
                            <a href="" class="windraw">Вывод средств</a>
                        </div>

                        <table >
                            <thead>
                            <tr>
                                <td class="head_text">
                                    Дата начисления
                                </td>
                                <td class="head_text">
                                    Начислено
                                </td>
                                <td class="head_text">
                                    Статус платежа
                                </td>
                                <td class="head_text">
                                    Дата платежа
                                </td>
                                <td class="head_text">
                                    Оплачено
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    01.02.2023
                                </td>
                                <td>
                                    $50
                                </td>
                                <td>
                                    Успешно
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                                <td>
                                    $50
                                </td>
                            </tr>

                            <tr class="gray_tr">
                                <td>
                                    01.02.2023
                                </td>
                                <td>
                                    $50
                                </td>
                                <td>
                                    Успешно
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                                <td>
                                    $50
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Подписчики -->
                <div id="page_trader_subscribe" class="profile_page">
                    <p class="title mobile_title">Подписчики</p>

                    <div class="table_wrap">
                        <table >
                            <thead>
                            <tr>
                                <td class="head_text">
                                    ID подписчика
                                </td>
                                <td class="head_text">
                                    Начало подписки
                                </td>
                                <td class="head_text">
                                    Срок подписки
                                </td>
                                <td class="head_text">
                                    Осталось до завершения
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Трейдер
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                                <td>
                                    3 дня
                                </td>
                            </tr>

                            <tr class="gray_tr">
                                <td>
                                    Трейдер
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                                <td>
                                    3 дня
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>


                <!-- Текущие прогнозы -->
                <div id="page_trader_forecasts" class="profile_page">
                    <p class="title mobile_title">Текущие прогнозы</p>
                    <div class="table_wrap">
                        <table >
                            <thead>
                            <tr>
                                <td class="head_text">
                                    ID<br> подписчика
                                </td>
                                <td class="head_text">
                                    Дата<br> создания
                                </td>
                                <td class="head_text">
                                    Рынок<br>(биржа)
                                </td>
                                <td class="head_text">
                                    Символ
                                </td>
                                <td class="head_text">
                                    Цена<br>открытия
                                </td>
                                <td class="head_text">
                                    Цель
                                </td>
                                <td class="head_text">
                                    S/L
                                </td>
                                <td class="head_text">
                                    Дата<br>завершения
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Трейдер
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                                <td>
                                    Форекс
                                </td>
                                <td>
                                    BTC/USDT
                                </td>
                                <td>
                                    22 000
                                </td>
                                <td>
                                    23 000
                                </td>
                                <td>
                                    21 000
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                            </tr>

                            <tr class="gray_tr">
                                <td>
                                    Трейдер
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                                <td>
                                    Форекс
                                </td>
                                <td>
                                    BTC/USDT
                                </td>
                                <td>
                                    22 000
                                </td>
                                <td>
                                    23 000
                                </td>
                                <td>
                                    21 000
                                </td>
                                <td>
                                    22.12.2023
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Сигналы -->
                @include('profile.beta.partials.signals')

                <div id="page_finance" class="profile_page">
                    Финансы
                </div>

                <!-- Настройка калькулятора -->
                <div id="page_settings_calc" class="profile_page">
                    <p class="title mobile_title">Калькулятор</p>
                    <div class="wrap_content">
                        <div class="left">
                            <form action="POST">
                                <div class="item">
                                    <p class="title">Рынок:</p>
                                    <select name="market" id="">
                                        <option value="Выбрать">Выбрать</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <p class="title">Биржа:</p>
                                    <select name="stock_market" id="">
                                        <option value="Выбрать">Выбрать</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <p class="title">Депозит:</p>
                                    <select name="deposite" id="">
                                        <option value="Выбрать">Выбрать</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <p class="title">Процент на сделку:</p>
                                    <select name="percent_order" id="">
                                        <option value="Выбрать">Выбрать</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <p class="title">Процент риска на день:</p>
                                    <select name="percent_day" id="">
                                        <option value="Выбрать">Выбрать</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <p class="title">Процент риска на неделю:</p>
                                    <select name="percent_week" id="">
                                        <option value="Выбрать">Выбрать</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <p class="title">Процент риска на месяц:</p>
                                    <select name="percent_month" id="">
                                        <option value="Выбрать">Выбрать</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <p class="title">Отменять не активные сделки через:</p>
                                    <select name="cancel_order" id="">
                                        <option value="Выбрать">Выбрать</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <p class="title">Отслеживание сделок:</p>
                                    <select name="traking_order" id="">
                                        <option value="Выбрать">Выбрать</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <p class="title">Тейк-Профит по умолчанию:</p>
                                    <select name="order_takeprofit" id="">
                                        <option value="Выбрать">Выбрать</option>
                                    </select>
                                </div>
                                <input type="submit" value="Сохранить" class="btn_save">

                            </form>

                        </div>

                        <div class="right">
                            <div class="item">
                                <p class="title">Стиль торговли:</p>
                                <select name="" id="">
                                    <option value="Пробой уровня">Пробой уровня</option>
                                </select>
                            </div>
                            <div class="item">
                                <p class="title">Выход из сделки:</p>
                                <select name="" id="">
                                    <option value="Стоп">Стоп</option>
                                </select>
                            </div>
                            <div class="item">
                                <p class="title">Торгуемый таймфрейм:</p>
                                <select name="" id="">
                                    <option value="5 минут">5 минут</option>
                                </select>
                            </div>
                            <div class="item">
                                <p class="title">Статистика и выбор меню:</p>
                                <select name="" id="">
                                    <option value="За час">За час</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Реферальная программа -->
                <div id="page_ref_programm_submenu" class="profile_page">
                    <div class="ref_programm">
                        <p class="title mobile_title">Реферальная программа</p>
                        <p class="discription">Построй свою бесконечную команду трейдеров по всему миру</p>

                        <div class="links_wrap">
                            <div class="left">
                                <p class="title">Ваша реферальная ссылка:</p>
                                <div class="ref_link_wrap">
                                    <input name='ref_code' type="text" value="http://my-traders.com/your_team">
                                    <img src="{{ asset('storage/img/copy.png') }}" alt="copy referal link" onclick="copy_buffer()">
                                </div>
                            </div>
                            <div class="right">
                                <div class="title">Рассказать друзьям</div>
                                <div class="contacts">
                                    <img src="{{ asset('storage/img/icon_tg.png') }}" alt="telegramm">
                                    <img src="{{ asset('storage/img/whatsApp.png') }}" alt="whatsapp">
                                    <img src="{{ asset('storage/img/mail_ru.png') }}" alt="mail.ru">
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="map_ref">
                        <div class="head">
                            <div class="item">
                                В 1 линии -
                                <p class="green">
                                    10 трейдеров
                                </p>
                            </div>
                            <div class="item">
                                Во 2 линии -
                                <p class="green">
                                    45 трейдеров
                                </p>
                            </div>
                            <div class="item">
                                В 3 линии -
                                <p class="green">
                                    186 трейдеров
                                </p>
                            </div>
                        </div>

                        <div class="map">
                            <div class="block">
                                <div class="line_head_left">
                                    <img src="{{ asset('storage/img/line_left_green.png') }}" alt="left green">
                                </div>

                                <div class="second_line left_second">
                                    <div class="line_second_left">
                                        <img src="{{ asset('storage/img/line_left_gray_big.png') }}" alt="left gray big">
                                    </div>

                                    <div class="center_second">
                                        Юлия
                                    </div>


                                    <div class="line_second_right">
                                        <img src="{{ asset('storage/img/line_right_gray_big.png') }}" alt="right gray big">
                                    </div>
                                </div>

                                <div class="three_line">
                                    <div class="three_line_block three_left_block">
                                        <img src="{{ asset('storage/img/line_gray_left_litle.png') }}" alt="left litle gray">
                                        <div class="three_line_center">
                                            Сергей
                                        </div>
                                        <img src="{{ asset('storage/img/line_gray_right_litle.png') }}" alt="left litle gray">
                                    </div>

                                    <div class="three_line_block three_right_block">
                                        <img src="{{ asset('storage/img/line_gray_left_litle.png') }}" alt="left litle gray">
                                        <div class="three_line_center">
                                            Мария
                                        </div>
                                        <img src="{{ asset('storage/img/line_gray_right_litle.png') }}" alt="left litle gray">
                                    </div>
                                </div>

                                <div class="four_line">
                                    <div class="name">Артём</div>
                                    <div class="name second_name">Глеб</div>
                                    <div class="name threee_name">Иван</div>
                                    <div class="name">Юлия</div>
                                </div>

                            </div>
                            <div class="center_head">
                                Иван
                            </div>
                            <div class="block">
                                <div class="line_head_right">
                                    <img src="{{ asset('storage/img/line_right_green.png') }}" alt="right green">
                                </div>

                                <div class="second_line right_second">
                                    <div class="line_second_left">
                                        <img src="{{ asset('storage/img/line_left_gray_big.png') }}" alt="left gray big">
                                    </div>
                                    <div class="center_second">
                                        Юлия
                                    </div>
                                    <div class="line_second_right">
                                        <img src="{{ asset('storage/img/line_right_gray_big.png') }}" alt="right gray big">
                                    </div>
                                </div>

                                <div class="three_line_right">
                                    <div class="three_line_block three_left_block">
                                        <img src="{{ asset('storage/img/line_gray_left_litle.png') }}" alt="left litle gray">
                                        <div class="three_line_center">
                                            Сергей
                                        </div>
                                        <img src="{{ asset('storage/img/line_gray_right_litle.png') }}" alt="left litle gray">
                                    </div>

                                    <div class="three_line_block three_right_block">
                                        <img src="{{ asset('storage/img/line_gray_left_litle.png') }}" alt="left litle gray">
                                        <div class="three_line_center">
                                            Сергей
                                        </div>
                                        <img src="{{ asset('storage/img/line_gray_right_litle.png') }}" alt="left litle gray">
                                    </div>
                                </div>

                                <div class="four_line_right">
                                    <div class="name">Артём</div>
                                    <div class="name second_name">Глеб</div>
                                    <div class="name threee_name">Иван</div>
                                    <div class="name">Юлия</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Команда -->
                <div id="page_ref_programm_team" class="profile_page">

                    <div class="wrap_title">
                        <p class="title mobile_title">
                            Команда
                        </p>
                        <div class="mobile_btns">
                            <div class="seacrh">

                                <img src="{{ asset('storage/img/search.png') }}" alt="search">
                            </div>

                            <div class="add_to_team">
                                <img src="{{ asset('storage/img/add_user.png') }}" alt="add user">
                            </div>
                        </div>
                    </div>






                    <div class="second_block">
                        <div class="left">
                            <div class="item active_item">Все</div>
                            <div class="item">
                                1 уровень
                                <p class="gray"> (120)</p>
                            </div>
                            <div class="item">
                                2 уровень
                                <p class="gray"> (471)</p>
                            </div>
                            <div class="item">
                                3 уровень
                                <p class="gray"> (12 520)</p>
                            </div>
                        </div>

                        <div class="seacrh">
                            <input type="text" placeholder="Поиск">
                            <img src="{{ asset('storage/img/search.png') }}" alt="search">
                        </div>

                        <div class="add_to_team">
                            <img src="{{ asset('storage/img/add_user.png') }}" alt="add user">
                        </div>

                        <div class="count_view">
                            <p class="count">10</p>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="table_wrap">
                        <div class="second_block_mobile">
                            <div class="count_view">
                                <p class="count">10</p>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>

                            <div class="left">
                                <div class="item active_item">
                                    Все
                                </div>
                                <div class="item">
                                    1 уровень
                                    <p class="gray"> (120)</p>
                                </div>
                                <div class="item">
                                    2 уровень
                                    <p class="gray"> (471)</p>
                                </div>
                                <div class="item">
                                    3 уровень
                                    <p class="gray"> (12 520)</p>
                                </div>
                            </div>




                        </div>

                        <table >
                            <thead>
                            <tr>
                                <td class="head_text">
                                    Имя
                                </td>
                                <td class="head_text">
                                    Ник
                                </td>
                                <td class="head_text">
                                    id
                                </td>
                                <td class="head_text">
                                    Дата <i class="fa-solid fa-chevron-down"></i>
                                </td>
                                <td class="head_text">
                                    Почта
                                </td>
                                <td class="head_text">
                                    Телеграмм
                                </td>
                                <td class="head_text">
                                    Тариф <i class="fa-solid fa-chevron-down"></i>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="td_with_new">
                                    <div class="new">NEW</div>
                                    Сергей
                                </td>
                                <td>Sergey001</td>
                                <td>1ad5dc</td>
                                <td>10.10.2023, 10:32</td>
                                <td>sergey@gmail.com</td>
                                <td>@Sergey</td>
                                <td>Сигналы</td>
                            </tr>

                            <tr class="gray_tr">
                                <td>Сергей</td>
                                <td>Sergey001</td>
                                <td>1ad5dc</td>
                                <td>10.10.2023, 10:32</td>
                                <td>sergey@gmail.com</td>
                                <td>@Sergey</td>
                                <td>Сигналы</td>
                            </tr>

                            <tr>
                                <td>
                                    Сергей
                                </td>
                                <td>Sergey001</td>
                                <td>1ad5dc</td>
                                <td>10.10.2023, 10:32</td>
                                <td>sergey@gmail.com</td>
                                <td>@Sergey</td>
                                <td>Сигналы</td>
                            </tr>

                            <tr class="gray_tr">
                                <td>Сергей</td>
                                <td>Sergey001</td>
                                <td>1ad5dc</td>
                                <td>10.10.2023, 10:32</td>
                                <td>sergey@gmail.com</td>
                                <td>@Sergey</td>
                                <td>Сигналы</td>
                            </tr>

                            <tr>
                                <td class="td_with_new">
                                    <div class="new">NEW</div>
                                    Сергей
                                </td>
                                <td>Sergey001</td>
                                <td>1ad5dc</td>
                                <td>10.10.2023, 10:32</td>
                                <td>sergey@gmail.com</td>
                                <td>@Sergey</td>
                                <td>Сигналы</td>
                            </tr>

                            <tr class="gray_tr">
                                <td class="td_with_new">  <div class="new">NEW</div>Сергей</td>
                                <td>Sergey001</td>
                                <td>1ad5dc</td>
                                <td>10.10.2023, 10:32</td>
                                <td>sergey@gmail.com</td>
                                <td>@Sergey</td>
                                <td>Сигналы</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                </div>

                <!-- Тарифы -->
                <div id="page_tarifs" class="profile_page">
                    <p class="title mobile_title">Тарифы</p>
                    <div class="second_block">
                        <div class="item active_item">1 месяц</div>
                        <div class="item">3 месяца</div>
                        <div class="item">6 месяцев</div>
                        <div class="item">12 месяцев</div>
                    </div>

                    <div class="block_tarifs">
                        <div class="tarif first">
                            <p class="title_tarif">«Статистика»</p>
                            <p class="dis">Полная аналитика Ваших сделок, подсказки сервиса на разных этапах работы с риск-менеджментом</p>
                            <div class="block">
                                <div class="price">
                                    <p class="black">$ 12.95 </p>
                                    <p class="gray">/ ежемесячно</p>
                                </div>
                                <div class="gray_price">$ 155.4 / год</div>
                                <div class="profit">Вы сохраняете $ 24 в год</div>
                            </div>

                            <div class="btn_buy">
                                Приобрести
                            </div>

                            <div class="advantages">
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Акции, валюты, монеты - все рынки включены</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Ведение Ваших сделок (автоматически/вручную)</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Изменение цен в реальном времени</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Глубокий анализ статистики</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Калькулятор с риск-менеджментом</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Оповещения в телеграмм о сделках</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Сохранение скриншотов</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Статистика по стилям торговли, времени</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Дневник трейдера (Твиты)</p>
                                </div>
                            </div>
                        </div>

                        <div class="tarif second">
                            <p class="title_tarif">«Сигналы»</p>
                            <p class="dis">Сервис берет на себя весь анализ. Вы - выбираете лучшее и повторяете. Учитесь.</p>
                            <div class="block">
                                <div class="price">
                                    <p class="black">$ 100 </p>
                                    <p class="gray">/ ежемесячно</p>
                                </div>
                                <div class="gray_price">$ 1000 / год</div>
                                <div class="profit">Вы сохраняете $ 200 в год</div>
                            </div>

                            <div class="btn_buy">
                                Приобрести
                            </div>

                            <div class="advantages">
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">4 рынка анализа (РФ, США, Форекс, Криптовалюты)</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Ежедневные LIVE-сделки</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Среднесрочные и внутридневные сделки</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Доходность в сделке (потенциальная)</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Полная отчетность</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Автоматический расчет данных, исходя из капитала</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Возможность отслеживания сделки</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Выбор любимого инструмента для анализа</p>
                                </div>

                            </div>
                        </div>

                        <div class="tarif green">
                            <p class="title_tarif">«Сигналы»</p>
                            <p class="dis">Сервис берет на себя весь анализ. Вы - выбираете лучшее и повторяете. Учитесь.</p>
                            <div class="block">
                                <div class="price">
                                    <p class="black">$ 100 </p>
                                    <p class="gray">/ ежемесячно</p>
                                </div>
                                <div class="gray_price">$ 1000 / год</div>
                                <div class="profit">Вы сохраняете $ 200 в год</div>
                            </div>

                            <div class="btn_buy">
                                Приобрести
                            </div>

                            <p class="dop_dis">
                                Широкий спектр услуг от сервиса, персональная статистика. Все нововведения включены в течение года. Вы ни за что более не платите.
                            </p>

                            <div class="advantages">
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Динамические фильтры</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Статистика по времени</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Статистика по инструментам</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Статистика по стилю торговли</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Изменение сделок</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('storage/img/bullet.png') }}" alt="bullet">
                                    <p class="dis_tarif">Быстрая поддержка</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>


        </div>


    </div>

    <!-- Модальные окна -->
    <x-profile-components.new-modals></x-profile-components.new-modals>
    <!-- Футер -->
    <x-footer-view></x-footer-view>
    <!-- Скрипты -->
    <x-profile-components.dashboard-scripts></x-profile-components.dashboard-scripts>
</x-app-layout>
