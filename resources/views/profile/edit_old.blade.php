<x-app-layout>

    <script>
        var user_info = {{ Js::from($user) }};
        var user_id = {{$user->id}};

    </script>
    <div id="main_view">
        <form action="{{route('profile.update_ones')}}" method="post" id="update_user_info" style="display: none;">
            <input type="hidden" name="name" value="">
            <input type="hidden" name="email" value="">

            <input type="hidden" name="deposit" value="">
            <input type="hidden" name="currency" value="">
            <input type="hidden" name="def_save_order" value="">

            <input type="hidden" name="not_news" value="">
            <input type="hidden" name="not_signals" value="">
            <input type="hidden" name="not_orders" value="">
        </form>
        <div class="m_wrap">
            <div id='main_info' class="main_info active_block_profile">
                <div class="first_block">
                    <img class="avatar" src="{{ asset('storage/img/users/default.png') }}" alt="avatar">
                    <p id="name"></p>
                    <p id="email"></p>
                    <div class="deposit">
                        <p class="gray_text">Депозит</p>
                        <div class="input_wrap">
                            <input id="deposit_update_block" type="text">
                            <select id="user_cur" onchange="update_deposite_and_cur(1)">
                                <option value="RUB">RUB</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>
                        <p class="gray_text">Ведение сделок</p>
                        <div class="class_chose_mode">
                            <p class="title">Автоматически</p>
                            <label class="checkbox-ios" >
                                <input id="mode_save_orders" onchange ='update_deposite_and_cur(1)' type="checkbox">
                                <span class="checkbox-ios-switch" ></span>
                            </label>
                        </div>
                        <a  id="update_deposit" data-type="update_deposit" class="btn_save_user_data" data-form_custom="#update_user_info">Сохранить</a>
                    </div>
                    <!-- <div class="currynce">
                        <p class="gray_text">Валюта</p>

                    </div> -->

                    <div class="date_reg_oclock">
                        <img src="{{ asset('storage/img/icon_calendar.png') }}" alt="calendar">
                        <p class="little_gray_text" id="date_reg">Присоединился </p>
                    </div>
                    <div class="date_reg_oclock">
                        <img src="{{ asset('storage/img/icon_oclock.png') }}" alt="calendar">
                        <p class="little_gray_text" >Москва (GMT+3) </p>
                    </div>
                    <div class="update_profile" onclick="change_blocks('start_update')">
                        Редактировать профиль
                    </div>
                </div>
                <div class="second_block">
                    <div class="balance">
                        <p class="title">Баланс</p>
                        <p id="balance"></p>
                        <div class="btn_deposite">
                            Пополнить
                        </div>
                    </div>
                    <div class="social">
                        <p class="title">Подпишись на нас</p>
                        <a href="https://t.me/my_traders">
                            Наш канал
                            <img src="{{ asset('storage/img/icon_tg.png') }}" alt="telegram">
                        </a>
                        <a href="https://t.me/fpcalcbot">
                            Наш бот
                            <img src="{{ asset('storage/img/icon_tg.png') }}" alt="telegram">
                        </a>
                    </div>
                </div>
                <div class="third_block">
                    <p class="title">Продукты</p>
                    <div class="wrap">
                        <div class="statisctic">
                            <p class="title">Статистика</p>
                            <p class="gray_text">Ограниченный функционал</p>
                            <div class="btn_buy">Приобрести</div>
                        </div>
                        <div class="item">
                            <p class="title">Сигналы</p>
                            <p class="gray_text">Ограниченный функционал</p>
                            <div class="btn_buy">Приобрести</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id='main_info_update' class="main_info_update disactive_block_profile">
                <div class="first_block">
                    <img class="avatar" src="{{ asset('storage/img/users/default.png') }}" alt="avatar">
                    <p id="name_update_block"></p>
                    <p id="email_update_block"></p>

                    <div class="deposit">
                        <p class="gray_text">Депозит</p>
                        <div class="input_wrap">
                            <input id="deposit_update_block_2" type="text">
                            <select id="user_cur_2" onchange="update_deposite_and_cur(2)">
                                <option value="RUB">RUB</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>
                        <p class="gray_text">Ведение сделок</p>
                        <div class="class_chose_mode">
                            <p class="title">Автоматически</p>
                            <label class="checkbox-ios" >
                                <input id="mode_save_orders_2" onchange ='update_deposite_and_cur(2)' type="checkbox">
                                <span class="checkbox-ios-switch" ></span>
                            </label>
                        </div>
                        <a id="update_deposit_2" data-type="update_deposit" class="btn_save_user_data" data-form_custom="#update_user_info">Сохранить</a>
                    </div>
                    <!-- <div class="currynce">
                        <p class="gray_text">Валюта</p>

                    </div> -->
                    <div class="date_reg_oclock">
                        <img src="{{ asset('storage/img/icon_calendar.png') }}" alt="calendar">
                        <p class="little_gray_text" id="date_reg_update_block">Присоединился </p>
                    </div>
                    <div class="date_reg_oclock">
                        <img src="{{ asset('storage/img/icon_oclock.png') }}" alt="calendar">
                        <p class="little_gray_text" >Москва (GMT+3) </p>
                    </div>
                    <div class="update_profile" onclick="change_blocks('cancel_update')">
                        Вернуться в профиль
                    </div>
                </div>
                <div class="second_block">
                    <p class="main_title">Настройки профиля</p>
                    <div class="line">
                        <p class="title">Имя пользователя</p>
                        <p class="black_text" id="name_update_block_2"></p>
                        <div class="change" onclick="OpenModal('name')">Изменить</div>
                    </div>
                    <div class="line">
                        <p class="title">Е-mail</p>
                        <p  class="black_text" id="email_update_block_2"></p>
                        <div class="change" onclick="OpenModal('email')">Изменить</div>
                    </div>
                    <div class="line">
                        <p class="title">Пароль</p>
                        <p class="black_text">***********</p>
                        {{--<div class="change" onclick="confirmResetPassword()">Изменить</div>--}}
                        <div class="change" onclick="OpenModal('old_pass')">Изменить</div>
                    </div>
                    <div class="bottom_btns">
                        <!-- <a href="logout" class="logout">Выйти из профиля</a> -->
                        <a href="" class="delete_user">Удалить профиль</a>
                        <a href=""  target="_ blank" id="update_tg">Сменить телеграмм аккаунт</a>
                    </div>
                </div>

                <div class="third_block">
                    <p class="main_title">Настройки уведомлений</p>
                    <p class="gray_text">Выберите, какие типы писем вы хотите получать от нас в Telegram</p>

                    <div  class="update_profile_dis_block" id="connect_tg">
                        <p>У вас не привязан телеграмм</p>
                        <a id="connect_tg_link" target="_ blank" href="">Привязать <img src="{{ asset('storage/img/icon_tg.png') }}" alt="tg"></a>
                    </div>
                    <div id="checkboxes_wrap">
                        <div id="checkboxes" class="update_profile_active_block">
                            <input type="checkbox" onchange ='update_notifications()' id="not_news" name="not_news">
                            <label for="not_news">Новости</label>
                        </div>
                        <div id="checkboxes" class="update_profile_active_block">
                            <input type="checkbox" onchange ='update_notifications()' id="not_signals" name="not_signals">
                            <label for="not_signals">Сигналы</label>
                        </div>
                        <div id="checkboxes" class="update_profile_active_block">
                            <input type="checkbox" onchange ='update_notifications()' id="not_orders" name="not_orders">
                            <label for="not_orders">Результаты сделок</label>
                        </div>
                        <div class="bottom_checkbox">
                            <p class="title">Отписать от всех писем</p>
                            <label class="checkbox-ios" >
                                <input id="dis_all_not" onchange ='update_notifications()' type="checkbox">
                                <span class="checkbox-ios-switch" ></span>
                            </label>
                        </div>
                    </div>


                    <a class="btn_save_updates btn_save_user_data" id="btn_save_updates"
                    {{--<a class="btn_save_updates" id="btn_save_updates" onclick="update_notifications()"--}}
                       data-type="update_notifications" data-form_custom="#update_user_info"
                    >
                        Сохранить изменения
                    </a>
                </div>
            </div>

            <!-- ИСтория покупок -->
            <div class="history_buy_wrap">
                <p class="title">История покупок</p>
                <div class="clear_history">
                    <img src="{{ asset('storage/img/smile.png') }}" alt="smile">
                    <p class="gray_text">Пока ничего не приобретено</p>
                </div>
            </div>

            <!-- Feedback -->
            <div class="feedback">
                <div class="left_block">
                    <p class="title">Ваш отзыв</p>
                    <div class="score">
                        <p class="gray_text">Ваша оценка</p>
                        <div class="rating-area">
                            <input type="radio" id="star-5" name="rating" value="5">
                            <label for="star-5" title="Оценка «5»"></label>
                            <input type="radio" id="star-4" name="rating" value="4">
                            <label for="star-4" title="Оценка «4»"></label>
                            <input type="radio" id="star-3" name="rating" value="3">
                            <label for="star-3" title="Оценка «3»"></label>
                            <input type="radio" id="star-2" name="rating" value="2">
                            <label for="star-2" title="Оценка «2»"></label>
                            <input type="radio" id="star-1" name="rating" value="1">
                            <label for="star-1" title="Оценка «1»"></label>
                        </div>
                    </div>
                    <textarea id="story" name="story" rows="5" cols="33" placeholder="Ваш отзыв (не более 200 символов)">

                    </textarea>
                    <div class="btn_send_feedback">
                        Отправить
                    </div>
                </div>
                <div class="right_block">
                    <img src="{{ asset('storage/img/feedback_women.png') }}" alt="feedback_women">
                </div>
            </div>
            <!-- Модальные окна -->
            <x-profile-components.modals></x-profile-components.modals>
            <x-footer-view></x-footer-view>
        </div>
    </div>
    <x-profile-components.main-scripts></x-profile-components.main-scripts>
</x-app-layout>
