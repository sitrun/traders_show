<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('storage/img/icon.png') }}" type="image/x-icon">
    <script src="/js/jquery-3.6.4.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/js/auth.js"></script>
    <script src="/js/forms.js"></script>
    <script src="https://kit.fontawesome.com/9c7d1b1ae7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
            crossorigin="anonymous">
    </script>

   {{-- <link rel="stylesheet" href="{{ mix("css/app.css") }}">
    <link rel="stylesheet" href="{{ mix("css/auth_old.css") }}">
    <link rel="stylesheet" href="{{ mix("css/education.css") }}">
    <link rel="stylesheet" href="{{ mix('css/article.css')  }}">--}}
    {{$target_styles ?? ''}}

    <title>Для Людей {{ $title ?? '| Главная' }}</title>
</head>
<body>
<x-menu></x-menu>


{{$slot}}


<x-footer-app></x-footer-app>