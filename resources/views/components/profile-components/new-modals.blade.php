<!-- Запрос старого пароля -->
<div id="modal_edit_pass_old_pass">
    <div class="wrap">
        <p class="title">Введите старый пароль</p>
        <p class="dis">Для продолжения необходимо подтвердить, что вы являетесь владельцем аккаунта</p>
        <div class="input_wrap">
            <input type="text" placeholder="Старый пароль">
            <a href="" class="forgot_pass">Забыли пароль?</a>
        </div>

        <div class="btns_wrap">
            <div class="cancel" onclick="disable_modal('modal_edit_pass_old_pass')">Отмена</div>
            <div class="next">Продолжить</div>
        </div>
    </div>
</div>

<!-- Выход из аккаунта -->
<div id="modal_exit">
    <div class="wrap">
        <p class="title">Вы действительно хотите выйти из аккаунта?</p>
        <div class="btns_wrap">
            <div class="yes">Да</div>
            <div class="no" onclick="disable_modal('modal_exit')">Нет</div>
        </div>
    </div>
</div>

<!-- Удаление аккаунта -->
<div id="modal_delete">
    <div class="wrap">
        <p class="title">Вы действительно хотите удалить аккаунт?</p>
        <div class="btns_wrap">
            <div class="yes">Да</div>
            <div class="no" onclick="disable_modal('modal_delete')">Нет</div>
        </div>
    </div>
</div>