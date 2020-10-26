<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/solid.min.css">

    <link href="{{ asset('formhelper/dist/css/bootstrap-formhelpers.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('formhelper/dist/js/bootstrap-formhelpers.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body,
        html {
            height: 100%;
            font-family: 'Crimson Text', Times, serif, serif;
            /* overflow: hidden; */
    
        }
    
        .mybg {
    
            background-image: url("../../../../bgrotated.jpg");
            height: 100%;
            background-position: center;
            /* background-repeat: no-repeat; */
            background-size: cover;
        }

       .wholediv{
            background-color: rgba(0,0,0,0.2);
        }

        .wholecard1{
            /* background-color: rgba(192,192,192,0.2); */
            background-color: rgba(0, 0, 0, 0);
            }

        .wholecard2{
            background-color: rgba(35, 55, 72, 0.5);
            }

        a{
            color: rgb(167, 167, 167);
        }

        a:hover {
            color:#3462A6;
        }
        
        .myactive{
            color: #235678 !important;
        }

        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }
        
        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }
        
        #sidebar-wrapper .list-group {
        width: 15rem;
        }
        
        #page-content-wrapper {
        min-width: 100vw;
        }
        
        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }
        
        @media (min-width: 768px) {
        #sidebar-wrapper {
        margin-left: 0;
        }
        
        #page-content-wrapper {
        min-width: 0;
        width: 100%;
        }
        
        #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
        }
        }
        hr { background-color: red; height: 1px; border: 0; }
        
        .lighttrans
        {
            background-color: rgba(255, 255, 255, 0.2);
        }

        
        input[type=text]:focus{
            background-color: rgba(255, 255, 255, 0.2);
        }
        input[type=date]:focus{
        background-color: rgba(255, 255, 255, 0.2);
        }
        option:enabled{
            background-color: #A4A4A4;

        }

        .myheader{
        background-color:rgba(12, 12, 38, 1);}

        </style>
</head>
<body class="mybg">
    <div id="app">
        <div class="d-flex" id="wrapper">
            <div class="wholediv border-right justify-content-center text-center " id="sidebar-wrapper">
                <div class="sidebar-heading">
                    <img class=" img-thumbnail" src="/storage/avatars/{{Auth::user()->avatar}}"
                        style="width:160px; height:160px; border-radius:50%"></div>
                <div class="list-group list-group-flush">
                    <h2 class="text-white">{{Auth::user()->name}}</h2>
                    <br>
                    <a href="/home" class="list-group-item wholediv">Dashboard</a>
                    <a href="/profile/{{Auth::user()->id}}" class="list-group-item wholediv">Profile</a>
                    @if (Auth::user()->admin == 0)
                    <a href="{{route('request.submit')}}" class="list-group-item wholediv">Request Mission</a>
                    <a href="{{route('leavereq.submit')}}" class="list-group-item wholediv">Request Time Off</a>
                    <a href="{{route('report.upload')}}" class="list-group-item wholediv ">Submit Report</a>
                    @endif
                </div>
            </div>
            {{-- Navbar --}}
        <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-md wholediv shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Andromeda
                </a>
                <nav class="navbar navbar-dark bg-transparent">
                <button class="navbar-toggler btn-outline-dark" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                    aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
                <div class="collapse  navbar-collapse" id="navbarToggleExternalContent">
                <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::is('home') ? 'myactive' : '' }}" href="/home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @if (Auth::user()->admin == 1)
                            <a class="nav-link {{ Request::is('users.list') ? 'myactive' : '' }}" href="/userslist">Employees</a>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'requests.inbox' ? 'myactive' : '' }}" href="{{route('requests.inbox')}}">Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'leavereq.inbox' ? 'myactive' : '' }}"
                                href="{{route('leavereq.inbox')}}">Leave Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'reports.inbox' ? 'myactive' : '' }}" href="{{route('reports.inbox')}}">Reports</a>
                        </li>
                    </ul>
                        <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="mr-2 " src="/storage/avatars/{{Auth::user()->avatar}}" style="width:40px; height:40px; border-radius:50%">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile/{{Auth::user()->id}}">
                                        User Profile
                                    </a>
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

        <main class="py-4">
            @yield('content')
        </main>
        </div>
        </div>
    </div>
    <script>
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });

        
    </script>
</body>
</html>
