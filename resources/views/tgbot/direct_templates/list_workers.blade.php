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
        <div class="col-xs-5 col-md-2">
            <h2>Меню бота</h2>
            <div class="btn-group-vertical" role="group" aria-label="...">

                <a class="btn btn-default" href="/bot_admin" role="button">Главная</a>
                <a class="btn btn-default" href="/bot_admin/list_users" role="button">Пользователи</a>
                {{--<div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Пользователи
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="/bot_admin/list_users" class="get_bot_info"
                               data-request-direct="bot_main_menu_admin"
                               data-request-type="list_users"
                            >Все клиенты</a>
                        </li>
                        <li><a href="#">Списки</a></li>
                        <li><a href="#">Поиск клиента</a></li>
                    </ul>
                </div>--}}


                <a class="btn btn-default active" href="/bot_admin/list_workers" role="button">Работники</a>
                {{--<div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Работники
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Админы</a></li>
                        <li><a href="#">Редакторы</a></li>
                        <li><a href="#">Поддержка</a></li>
                        <li><a href="#">Список работников</a></li>
                    </ul>
                </div>--}}
                {{--<button type="button" class="btn btn-default">Отложенные посты</button>--}}
                <a class="btn btn-default" href="/bot_admin/aside_posts" role="button">Отложенные посты</a>
                {{--<div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Оплата
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Все клиенты</a></li>
                        <li><a href="#">По периодам</a></li>
                        <li><a href="#">По продуктам</a></li>
                    </ul>
                </div>--}}
                <a class="btn btn-default" href="/bot_admin/payments" role="button">Оплата</a>
                {{--<div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Параметры
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Калькулятор</a></li>
                        <li><a href="#">Изменить тексты</a></li>
                        <li><a href="#">Изменить</a></li>
                        <li><a href="#">Изменить пробный период</a></li>
                    </ul>
                </div>--}}
                <a class="btn btn-default" href="/bot_admin/params" role="button">Параметры</a>
                {{--<div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Тарифы
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Список тарифов</a></li>
                        <li><a href="#">Добавить тариф</a></li>
                        <li><a href="#">Скидки работают</a></li>
                        <li><a href="#">Скидки прошли</a></li>
                    </ul>
                </div>--}}
                <a class="btn btn-default" href="/bot_admin/tariffs" role="button">Тарифы</a>
                <a class="btn btn-danger" href="/admin_bot_logout" role="button">Выход</a>
            </div>
        </div>
        <div class="col-xs-1">
        </div>
        <div class="col-xs-6">
            <h2 class="current_menu">Работники</h2>
            <div class="view_result" id="view_result">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>username</th>
                        <th>Должность</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $el)
                        <tr>
                            <td>{{ $el->user_id }}</td>
                            <td>{{ $el->tg_username	}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-xs-12 change_role_worker">
                                        <select name="new_role" id="">
                                            <option value="1" {{$el->role == 1 ? 'selected' : ''}}>Гл.админ</option>
                                            <option value="2" {{$el->role == 2 ? 'selected' : ''}}>Редактор</option>
                                            <option value="3" {{$el->role == 3 ? 'selected' : ''}}>Тех.поддержка</option>
                                        </select>
                                        <button type="button"
                                                class="btn btn-warning form_action_btn"
                                                data-request-type="change_role"
                                                data-id="{{ $el->id }}"
                                                data-parent=".change_role_worker"
                                        >Изменить роль</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="center_wrap">

    </div>

</div>

<x-footer-scripts-bot-admin></x-footer-scripts-bot-admin>
</body>
</html>