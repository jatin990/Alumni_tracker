<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'alumni tracker') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <img src="/storage/images/logo-white.png" alt="Alumn">

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if(\Request::is('login/*') || (Request::is('profile/*')))
                        @auth('web')
                        @can('view',$user->profile)
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('events.show',['user'=>auth()->user()->id])}}">Event</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{route('notices.show',['user'=>auth()->user()->id])}}">Notices</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Group Chat</a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href='{{route('profile.connect',['user'=>auth()->user()->id])}}'>Connections</a>
                        </li>
                        @endcan
                        @endauth
                        @endif


                        @if(\Request::is('c_admin/*')|| (Request::is('c_admin_profile/*')))
                        @auth('c_admin')
                        @can('view',$c_admin->c_admin_profile)
                        <li class="nav-item"><a class="nav-link"
                                href="{{route('admin_events.show', ['c_admin'=>auth()->user()->id])}}">Event</a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{route('admin_notices.show', ['c_admin'=>auth()->user()->id])}}">Notices</a></li>
                        <li class="nav-item"><a class="nav-link" href="#requests">Alumni requests</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Group Chat</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Alumni</a></li>
                        @endcan
                        @endauth
                        @endif

                        @if(\Request::is('d_admin/*')|| (Request::is('d_admin_profile/*')))
                        @auth('d_admin')
                        <li class="nav-item"><a class="nav-link"
                                href="{{route('dir_events.show', ['d_admin'=>auth()->user()->id])}}">Event</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{route('dir_notices.show', ['d_admin'=>auth()->user()->id])}}">Notices</a></li>
                        <li class="nav-item"><a class="nav-link" href="#requests">College staff requests</a></li>

                        <li class="nav-item"><a class="nav-link" href="#">College admins</a></li>
                        @endauth
                        @endif

                        @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        @auth('web')
                        <a href="{{route('profile.show', ['user'=> auth()->user()->id])}}">
                            <img src="{{  Auth::user()->profile->profileImage() }}" style='width: 40px;'
                                class="rounded-circle ">
                        </a>
                        @endauth

                        @auth('c_admin')
                        <a href="{{route('c_admin_profile.show', ['c_admin'=> auth()->user()->id])}}">
                            <img src="{{  Auth::user()->c_admin_profile->profileImage() }}" style='width: 40px;'
                                class="rounded-circle">
                        </a>
                        @endauth

                        @auth('d_admin')
                        <a href="{{route('d_admin_profile.show', ['d_admin'=> auth()->user()->id])}}">
                            <img src="{{  Auth::user()->d_admin_profile->profileImage() }}" style='width: 40px;'
                                class="rounded-circle">
                        </a>
                        @endauth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
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
</body>

</html>