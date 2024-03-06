<div id="page_notifications" class="profile_page">
    <div class="wrap">
        <form action="POST">
            <p class="title mobile_title">Уведомления</p>
            <div class="first_block">

                <p class="discription">Какие типы писем вы хотите получать от нас</p>
                <div id="checkboxes" class="update_profile_active_block">
                    <input type="checkbox"  id="not_news" name="not_news">
                    <label for="not_news">Новости</label>
                </div>
                <div id="checkboxes" class="update_profile_active_block">
                    <input type="checkbox" id="not_signals" name="not_signals">
                    <label for="not_signals">Сигналы</label>
                </div>
                <div id="checkboxes" class="update_profile_active_block">
                    <input type="checkbox"  id="not_results" name="not_results">
                    <label for="not_results">Результаты сделок</label>
                </div>
            </div>
            <div class="second_block">
                <p class="discription">Куда вы хотите получать письма от нас</p>
                <div id="checkboxes" class="update_profile_active_block">
                    <input type="checkbox"  id="not_mail" name="not_mail">
                    <label for="not_mail">Почта</label>
                </div>
                <div id="checkboxes" class="update_profile_active_block">
                    <input type="checkbox" id="not_telegramm" name="not_telegramm">
                    <label for="not_telegramm">Телеграмм</label>
                </div>
                <div class="input_tg_wrap">

                    <input type="text" placeholder="Впишите никнейм" name="tg_username">
                    <p>@</p>
                </div>
            </div>

            <div class="bottom_checkbox">
                <p class="title">Отписать от всех писем</p>
                <label class="checkbox-ios" >
                    <input id="dis_all_not"type="checkbox">
                    <span class="checkbox-ios-switch" ></span>
                </label>
            </div>


            <input type="submit" value="Сохранить изменения" class="btn_save">
        </form>

    </div>
</div>