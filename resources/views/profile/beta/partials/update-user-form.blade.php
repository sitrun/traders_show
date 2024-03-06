<div id="page_userinfo" class="profile_page">
    @php
    //Произвольный код

    //print_r($user->birthday);
    //echo("day is ".$date_birthday->day);
    //dump($date_birthday);
    //dump(Carbon::parse($user->birthday));
    //dd($user)
    @endphp

    <div id="wrap">
        <div class="wrap_title mobile_title">
            <p class="title">Личные данные</p>
        </div>

        <div class="line">
            <img src="{{ asset('storage/img/avatar_old.png') }}" alt="avatar">
        </div>

        <div class="line">
            <p class="dis">Фамилия</p>
            <p class="value">{{$user->family}}</p>
        </div>
        <div class="line">
            <p class="dis">Имя</p>
            <p class="value">{{$user->name}}</p>
        </div>
        <div class="line">
            <p class="dis">Второе имя</p>
            <p class="value">{{$user->second_name}}</p>
        </div>
        <div class="line">
            <p class="dis">Псевдоним</p>
            <p class="value">{{$user->nick_name}}</p>
        </div>
        <div class="line">
            <p class="dis">Дата рождения</p>
            <p class="value">{{$date_birthday->isoFormat('D.MM.Y')}}</p>
        </div>
        <div class="line">
            <p class="dis">Пол</p>
            <p class="value">{{$user->sex ? 'Мужской' : 'Женский'}}</p>
        </div>
        <div class="line">
            <p class="dis">Страна</p>
            <p class="value">{{$user->country}}</p>
        </div>
        <div class="line">
            <p class="dis">Город</p>
            <p class="value">{{$user->city}}</p>
        </div>
        <div class="line">
            <p class="dis">Номер телефона</p>
            <p class="value">{{$user->tel}}</p>
        </div>
        <div class="line">
            <p class="dis">E-mail</p>
            <p class="value">{{$user->email}}</p>
        </div>
        <div class="line">
            <p class="dis">Пароль</p>
            <p class="value">********</p>
        </div>

        <div class="wrap_btns">
            <div class="edit_btn" onclick="switch_mode('wrap_edit_profile','wrap')">Редактировать профиль</div>
            <p class="delete_profile_btn" onclick="display_modal('modal_delete')">Удалить профиль</p>
        </div>

    </div>

    <div id="wrap_edit_profile">
        <form method="POST" class="request_ajax_form">
            @method('post')
            @csrf
            <p class="title">Редактировать личные данные</p>

            <div class="line_avatar line">
                <img src="{{ asset('storage/img/avatar.png') }}" alt="avatar">
                <p class="dis">Загрузить <br>аватар</p>
            </div>

            <div class="line_full line">
                <p class="dis">Фамилия</p>
                <input type="text" class="input" name='family' value="{{$user->family}}">
            </div>
            <div class="line_full line">
                <p class="dis">Имя</p>
                <input type="text" class="input" name="name" value="{{$user->name}}">
            </div>
            <div class="line_full line">
                <p class="dis">Второе имя</p>
                <input type="text" class="input" name="second_name" value="{{$user->second_name}}">
            </div>
            <div class="line_full line">
                <p class="dis">Псевдоним</p>
                <input type="text" class="input" name="nick_name" value="{{$user->nick_name}}">
            </div>

            <div class="line_date line">
                <p class="dis">Дата рождения</p>
                <div class="wrap_inputs">
                    <input type="number" class="day input" name="date_day" value="{{$date_birthday->day}}">
                    <input type="number" class="month input" name="date_month" value="{{$date_birthday->month}}">
                    <input type="number" class="year input" name="date_year" value="{{$date_birthday->year}}">
                    <input type="hidden" name="birthday" value="{{$user->birthday}}">
                </div>
            </div>

            <div class="line_male line">
                <p class="dis">Пол</p>
                <div class="wrap_radio">
                    <input class="radio" type="radio" id="radio_1" name="sex" value="1" {{$user->sex ? 'checked' : ''}}>
                    <span class="fake"></span>
                    <label for="radio_1"> Мужской</label>

                    <input class="radio" type="radio" id="radio_2" name="sex" value="0" {{$user->sex ? '' : 'checked'}}>
                    <span class="fake fake2"></span>
                    <label for="radio_2"> Женский</label>
                </div>

            </div>

            <div class="line_select line">
                <p class="dis">Страна</p>
                <select name="country" id="" class="input">
                    <option value="Россия" selected>Россия</option>
                </select>
            </div>

            <div class="line_select line">
                <p class="dis">Город</p>
                <select name="city" id="" class="input">
                    <option value="Москва" selected>Москва</option>
                </select>
            </div>

            <div class="line_full line">
                <p class="dis">Номер телефона</p>
                <input type="text" class="input" name="tel" value="{{$user->tel}}">
            </div>
            <div class="line_full line">
                <p class="dis">E-mail</p>
                <input type="text" class="input" name="email" value="{{$user->email}}" disabled>
            </div>

            <div class="line_pass line">
                <p class="dis">Пароль</p>
                <div class="wrap_pass">
                    <p class="secret">*********</p>
                    <div class="change_pass" onclick="display_modal('modal_edit_pass_old_pass')">Изменить пароль</div>
                </div>
            </div>

            <div class="line_btns">

                <input type="submit" data-request-type="update_user" value="Сохранить" class="save_changed save_btn">
                <div class="btn_cancel" onclick="switch_mode('wrap','wrap_edit_profile')">Отмена</div>
            </div>
        </form>



    </div>


</div>