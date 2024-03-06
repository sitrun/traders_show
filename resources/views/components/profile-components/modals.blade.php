<div id="profile_modal_name" class="profile_dis_modal">
    <div class="center_wrap">
        <div class="title">
            Введите новое имя
        </div>
        <div class="gray_text">
            Введите Ваше новое имя
        </div>
        <input type="text" placeholder="Ваше имя" id="new_name">
        <div class="btns_wrap">
            <div class="cancel" onclick="CloseModal('name')">Отмена</div>
            <a class="save btn_save_user_data" id="save_name_link"  data-type="update_name" data-form_custom="#update_user_info">Сохранить</a>
        </div>
    </div>
</div>

<div id="profile_modal_email" class="profile_dis_modal">
    <div class="center_wrap">
        <div class="title">
            Введите новый email
        </div>
        <div class="gray_text">
            Введите адрес электронной почты, чтобы иметь возможность восстановить доступ к аккаунту и получать уведомления
        </div>
        <input type="text" placeholder="Ваше e-mail" id="new_email">
        <div class="btns_wrap">
            <div class="cancel" onclick="CloseModal('email')">Отмена</div>
            <a class="save btn_save_user_data" id="save_email_link"  data-type="update_email" class="btn_save_user_data" data-form_custom="#update_user_info">Сохранить</a>
        </div>
    </div>
</div>

<div id="profile_modal_old_pass" class="profile_dis_modal">
    <div class="center_wrap" style="height: auto; padding: 2rem;">
        @include('profile.partials.update-password-form')
    </div>
</div>

<div id="profile_modal_new_pass" class="profile_dis_modal" style="padding: 2rem; height: auto;">
    <div class="center_wrap">
        <div class="title">
            Придумайте пароль
        </div>
        <div class="gray_text">
            Пароль дополнительно защитит ваш аккаунт от взлома
        </div>
        <input type="text" placeholder="Придумайте пароль" id="new_pass">
        <hr>
        <input type="text" placeholder="Повторите пароль" id="new_pass_2">
        <div id="error_new_pass"></div>
        <div class="btns_wrap">
            <div class="cancel" onclick="CloseModal('new_pass')">Отмена</div>
            <a class="save" id="save_pass_link" onclick="verifyPass()">Сохранить</a>
        </div>
    </div>
</div>
