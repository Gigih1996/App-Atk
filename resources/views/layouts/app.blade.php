<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" href="{{ public_path('images/logo/abais.ico') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">

</head>

@yield('css')
@yield('js')

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    ATK System
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            <!-- @if (Route::has('register'))
    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
    @endif -->
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user-friends"></i>
                                    {{ __('User') }} </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}"><i class="fas fa-building"></i>
                                    {{ __('Role') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown">
                                    <i class="fa fa-building"></i> Kabinet
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('kabinet.index') }}"
                                        href="{{ route('kabinet.index') }}">
                                        {{ __('Manage') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('kabinet.create') }}"
                                        href="{{ route('kabinet.index') }}">
                                        {{ __('Create') }}
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown">
                                    <i class="fa fa-archive"></i> Archive
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('archives.index') }}"
                                        href="{{ route('archives.index') }}">
                                        {{ __('Manage') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('archives.create') }}"
                                        href="{{ route('archives.index') }}">
                                        {{ __('Create') }}
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown">
                                    <i class="fa fa-upload"></i> ATK System
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('digitals.index') }}"
                                        href="{{ route('digitals.index') }}">
                                        {{ __('Upload File') }}
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown">
                                    <i class="fa fa-cog"></i> Setting
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('jenis_arsip.index') }}"
                                        href="{{ route('jenis_arsip.index') }}">
                                        {{ __('Jenis Arsip') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('media_arsip.index') }}"
                                        href="{{ route('media_arsip.index') }}">
                                        {{ __('Media Arsip') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('status.index') }}"
                                        href="{{ route('status.index') }}">
                                        {{ __('Status') }}
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown">
                                    {{ Auth::user()->name }} <span
                                        class="badge badge-secondary">{{ Auth::user()->roles->pluck('name')[0] }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
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

            <div class="fixed-bottom">
                <nav class="main-header navbar navbar-expand navbar-white navbar-dark bg-dark">
                    <div class="col-6">
                        <small>&copy;PT. INTI NOMIKA INDONESIA</small>
                    </div>
                    <div class="col-6 text-right">
                        <span>
                            Version 1.1
                        </span>
                    </div>
                </nav>
            </div>
            @include('sweetalert::alert')
        </main>
    </div>

</body>

</html>
