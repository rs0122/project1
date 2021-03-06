<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;400;600&display=swap" rel="stylesheet" type="text/css">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/cfront.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
        <script type="text/javascript" src="./js/slick.min.js"></script>
        <link href="{{ secure_asset('css/slick-theme.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/slick.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                         <a class="navbar-brand" href="{{ url('/') }}">Livelife</a>
                         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                         </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/mypage') }}">MyPage</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Search
                </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/condo') }}">販売物件一覧</a>
                <a class="dropdown-item" href="{{ url('/column') }}">コラム一覧</a>
            </div>
            </li>
            </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav ml-auto">
                        @guest
                            <div class="login-form">
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                <li class="new-register">新規登録は<a class="regis" href="{{ route('register') }}">こちら</a>から</li>
                            </div>
                         @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                            </ul>
            </div>
        </div>
</nav>
                   
                
            @if (session('success'))
            <div class="flash_message bg-success text-center py-3 my-0">
                {{ session('success') }}
            </div>
            @endif
            <main class="main-content">
                @yield('content')
            </main>
        </div>
        </div>
    </body> 
    
</html>