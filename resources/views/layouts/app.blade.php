<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- ßPopper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/animate.css') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="">
        
        <div class="banner-top animated fadeInDown">
            <h1 class="banner-text">Research and Management System ULAB</h1>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow animated fadeIn slower">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    OFR ULAB
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    @guest
                    
                    @else
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item {{ Request::is('home') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('home') }}">Home</a>
                        </li>

                        @if( Auth::user()->is_admin )


                            <li class="nav-item {{ Request::is('newclaim') ? 'active' : ''}}">
                                <a class="nav-link" href="{{ url('publication/journals') }}">New Claim</a>
                            </li>

                            <li class="nav-item dropdown {{ Request::is('claim') ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" href="{{ url('claim') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Existing Publication
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    <li class=" {{ Request::is('claim') ? 'active' : ''}}">
                                        <a class="dropdown-item" href="{{ url('acceptedjournals') }}">Accepted</a>
                                    </li>

                                    <li class=" {{ Request::is('claim') ? 'active' : ''}}">
                                        <a class="dropdown-item" href="{{ url('rejectedjournals') }}">Rejected</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item dropdown {{ Request::is('researchgrant') ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" href="{{ url('researchgrant') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Research Grant
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    <li class=" {{ Request::is('claim') ? 'ongoingresearch' : ''}}">
                                        <a class="dropdown-item" href="{{ url('ongoingresearch') }}">Ongoing Project</a>
                                    </li>

                                </ul>
                            </li>

                        @elseif( Auth::user()->is_user )
                            
                            <li class="nav-item dropdown {{ Request::is('claim') ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" href="{{ url('claim') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Reward Claim
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    <li class=" {{ Request::is('claim') ? 'active' : ''}}">
                                        <a class="dropdown-item" href="{{ url('claim') }}">Application</a>
                                    </li>

                                    <li class=" {{ Request::is('claim') ? 'active' : ''}}">
                                        <a class="dropdown-item" href="{{ url('publications/journal') }}">View Status</a>
                                    </li>

                                </ul>
                            </li>


                            <li class="nav-item dropdown {{ Request::is('researchgrant') ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" href="{{ url('researchgrant') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Research Grant
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    <li class=" {{ Request::is('claim') ? 'researchgrantapplication' : ''}}">
                                        <a class="dropdown-item" href="{{ url('researchgrantapplication') }}">New Applicaton</a>
                                    </li>

                                    <li class=" {{ Request::is('claim') ? 'ongoingresearch' : ''}}">
                                        <a class="dropdown-item" href="{{ url('ongoingresearch') }}">Ongoing Project</a>
                                    </li>

                                    <li class=" {{ Request::is('reviewerreports') ? 'active' : ''}}">
                                        <a class="dropdown-item" href="{{ url('reviewerreports') }}">Reviewer Reports</a>
                                    </li>

                                </ul>
                            </li>

                        @elseif( Auth::user()->is_reviewer )

                            <li class="nav-item dropdown {{ Request::is('researchgrant') ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" href="{{ url('researchgrant') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Research Grant
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    <li class=" {{ Request::is('reviewerreports') ? 'active' : ''}}">
                                        <a class="dropdown-item" href="{{ url('reviewerreports') }}">Reviewer Reports</a>
                                    </li>

                                </ul>
                            </li>

                        @endif

                    @endguest

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if( Auth::user()->is_user )
                                        <span class="dropdown-item" href="{{ route('logout') }}">
                                            <strong>Reward Points: {{ Auth::user()->reward_points }}</strong>
                                        </span>
                                        <span class="dropdown-item" href="{{ route('logout') }}">
                                            <strong>Cash Rewards: {{ Auth::user()->cash_rewards }}</strong>
                                        </span>
                                        <span class="dropdown-item" href="{{ route('logout') }}">
                                            <strong>Incentive Points: {{ Auth::user()->points }}</strong>
                                        </span>
                                    @endif

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
</body>


</html>
