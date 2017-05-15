<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
    <div id="app">
        <nav class="nav has-shadow">
            <div class="container">
                <div class="nav-left">
                    <a class="nav-item" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <a class="nav-item is-tab is-hidden-mobile" href="{{ url('/containers') }}">Containers</a>
                </div>
                <span class="nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <div class="nav-right nav-menu">
                    @stack('right-nav-menu')
                    @if (Auth::guest())
                        <a class="nav-item is-tab" href="{{ url('/login') }}">Login</a>
                        <a class="nav-item is-tab" href="{{ url('/register') }}">Register</a>
                    @else
                        <div class="nav-item">
                            <a class="button is-info" href="{{ url('/containers/create') }}">
                                <span>Create container</span>
                            </a>
                        </div>
                        <a class="nav-item is-tab" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            Logout</a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>
            </div>



        </nav>
        @yield('content')

    </div>
</body>
</html>
