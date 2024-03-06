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


                <a class="btn btn-default" href="/bot_admin/list_workers" role="button">Работники</a>
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
                <a class="btn btn-default active" href="/bot_admin/params" role="button">Параметры</a>
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
            <h2 class="current_menu">Параметры</h2>
            <div class="view_result" id="view_result">
                {{--<a class="btn btn-default" href="#" role="button">Калькулятор</a>
                <a class="btn btn-default" href="#" role="button">Изменить тексты</a>
                <a class="btn btn-default" href="#" role="button">Изменить</a>
                <a class="btn btn-default" href="#" role="button">Изменить пробный период</a>--}}
                <ul class="nav nav-tabs" id="paramsTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="params_calc-tab" data-toggle="tab" href="#params_calc"
                           role="tab" aria-controls="params_calc" aria-selected="true" aria-expanded="true">Калькулятор</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="params_change_text-tab" data-toggle="tab" href="#params_change_text"
                           role="tab" aria-controls="params_change_text" aria-selected="false" aria-expanded="false">Изменить тексты</a>
                    </li>
                    {{--<li class="nav-item">
                        <a class="nav-link" id="params_change-tab" data-toggle="tab" href="#params_change"
                           role="tab" aria-controls="params_change" aria-selected="false" aria-expanded="false">Изменить</a>
                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" id="params_trial-tab" data-toggle="tab" href="#params_trial"
                           role="tab" aria-controls="params_trial" aria-selected="false" aria-expanded="false">Пробный период</a>
                    </li>
                </ul>
                <div class="tab-content" id="paramsTabContent">
                    <div class="tab-pane"
                         id="params_calc" role="tabpanel" aria-labelledby="params_calc-tab" aria-expanded="true">

                        <a class="btn btn-default" href="https://t.me/rmclan_bot" role="button">В калькулятор</a>
                    </div>
                    <div class="tab-pane"
                         id="params_change" role="tabpanel" aria-labelledby="params_change-tab" aria-expanded="false">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                <input type="text" class="form-control" placeholder="FAQ">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Изменить FAQ</button>
                                  </span>
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="О нас">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Изменить О нас</button>
                                  </span>
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->

                        </div><!-- /.row -->
                        <div class="row">

                        </div>

                    </div>
                    <div class="tab-pane"
                         id="params_change_text" role="tabpanel" aria-labelledby="params_change_text-tab" aria-expanded="false">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>имя в коде</th>
                                <th>текст</th>
                                <th>опции</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bot_texts as $el)
                                <tr class="bot_text">
                                    <td>{{$el->id}}</td>
                                    <td>{{$el->name}}</td>
                                    <td>
                                        <textarea name="bot_text" id="" cols="50" rows="5">{{$el->message}}</textarea></td>
                                    <td><button type="button" class="btn btn-success form_action_btn"
                                                data-request-type="save_bot_text"
                                                data-id="{{ $el->id }}"
                                                data-parent=".bot_text"
                                        >Сохранить</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane"
                         id="params_trial" role="tabpanel" aria-labelledby="params_trial-tab" aria-expanded="false">
                        Пробный период установлен <b>{{$trial_days->value}}дн</b>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="center_wrap">

    </div>

</div>

<x-footer-scripts-bot-admin></x-footer-scripts-bot-admin>
</body>
</html>