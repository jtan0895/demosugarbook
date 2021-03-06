<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myapp.css') }}" rel="stylesheet">

    <!-- BootStraps -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="headCSS navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand titlehead" href="{{ url('/') }}">
                    sugarbook
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link titlehead" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link titlehead" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a href="/profile" class="dropdown-item titlehead">Go to profile Page</a>
                                
                                <div class="pt-2"><a href="/restaurant/create" class="dropdown-item titlehead">Add a Restaurant</a></div>
                                    

                                    <a class="dropdown-item titlehead" href="{{ route('logout') }}"
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @section('footer')
    <nav class="headCSS navbar navbar-expand-lg justify-content-between">
        <div class="container ">
        <div class="row">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item col-2">
                <a class="anchor" href="#">Help</a>
            </li>
            <li class="nav-item col-5">
                <a class="anchor" href="#">Send Feedback</a>
            </li>
            <li class="nav-item col-3">
                <a class="anchor" href="#">Privacy</a>
            </li>
            <li class="nav-item col-3">
                <a class="anchor" href="#">Terms</a>
            </li>
            </ul>
        </div></div>
        <div class="row">
        <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="navbar-nav">
            <p class="col-4 avg">Follow us:</p>
            <li class="nav-item col-3">
                <a class="anchor" href="#">Facebook</a>
            </li>
            <li class="nav-item col-3">
                <a class="anchor" href="#">instagram</a>
            </li>
            <li class="nav-item col-3">
                <a class="anchor" href="#">Tiktok</a>
            </li>
            </ul>
        </div></div>
        
</nav>
<p class="copy">Copyright 2021</p>
        </div>
            
    @show
</body>
</html>
