<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Album') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <style>
        .custom-file-label::after {
            content: "Parcourir";
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @admin
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle{{ currentRoute(route('category.create'))}}" href="#" id="navbarDropdownGestCat" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                @lang('Administration')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
                                <a class="dropdown-item" href="{{ route('category.create') }}">
                                    <i class="fas fa-plus fa-lg"></i> @lang('Ajouter une catégorie')
                                </a>
                                <a class="dropdown-item" href="{{ route('category.index') }}">
                                    <i class="fas fa-wrench fa-lg"></i> @lang('Gérer les catégories')
                                </a>
                            </div>
                        </li>
                        @endadmin
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle{{ currentRoute(route('image.create'))}}"
                                   href="#" id="navbarDropdownGestAlbum" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    @lang('Gestion')
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownGestAlbum">
                                    <a class="dropdown-item" href="{{ route('image.create') }}">
                                        <i class="fas fa-images fa-lg"></i> @lang('Ajouter une image')
                                    </a>
                                </div>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item{{ currentRoute(route('login')) }}">
                                <a class="nav-link" href="{{ route('login') }}">@lang('Connexion')</a>
                            </li>
                            <li class="nav-item{{ currentRoute(route('register')) }}">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">@lang('Inscription')</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('Déconnexion')
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
            @if (session('ok'))
                <div class="container">
                    <div class="alert alert-dismissible alert-success fade show" role="alert">
                        {{ session('ok') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js"></script>

    @yield('script')

</body>
</html>
