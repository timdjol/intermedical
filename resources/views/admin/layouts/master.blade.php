<!doctype html>
<html lang="en">
<head>
    <title>@yield('title') - Intermedical</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{route('index')}}/css/admin.css">
</head>
<body>
<header>
    <div class="head">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ route('index') }}/img/logo.png" alt="Logo">
                    </a>
                </div>
                <div class="col-md-9">
                    <nav>
                        <a href="#" class="toggle-mnu d-xl-none d-lg-none"><span></span></a>
                        <ul>
                            <li class="current"><a href="{{ route('index') }}" target="_blank">Перейти на сайт</a></li>
                            @guest
                                <li><a href="{{route('register')}}">Регистрация</a></li>
                                <li><a href="{{route('login')}}">Войти</a></li>
                            @endguest
                            @auth
                                {{--                                <li>{{ $user->name }}</li>--}}
{{--                                <li><a href="{{ route('get-logout') }}">Выйти</a></li>--}}
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer>
    <div class="copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Intermedical {{ date('Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>