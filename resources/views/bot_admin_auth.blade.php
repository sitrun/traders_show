<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('storage/img/icon.png') }}" type="image/x-icon">
    <script src="/js/jquery-3.6.4.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ mix("css/bot_admin.css") }}">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://kit.fontawesome.com/9c7d1b1ae7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
            crossorigin="anonymous">
    </script>

    <title>Админка бота</title>
</head>
<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">



<div class="m_wrap">
    <div class="row main_bot_view">
        <div class="col-xs-2">
            <div class="center_wrap">
                <!-- Авторизация -->
                <form action="{{ route('check_auth') }}" method="POST" class="form active bot_admin_auth">
                    @csrf
                    <p class="title">Введите логин и пароль</p>
                    <input type="hidden" name="login_type" value="login">
                    <div class="form-group">
                        <label for="login_admin">Логин</label>
                        <input name="email" type="text" class="form-control" id="login_admin" placeholder="Login_admin">
                    </div>
                    <div class="form-group">
                        <label for="password1">Пароль</label>
                        <input name="password"  type="password" class="form-control" id="password1" placeholder="Password">
                    </div>
                    <button type="button" data-form_custom=".bot_admin_auth"
                            class="btn btn-default"
                            id="check_auth">Авторизация</button>
                </form>
            </div>
        </div>

    </div>
    

</div>
<x-footer-scripts-bot-admin></x-footer-scripts-bot-admin>
</body>
</html>