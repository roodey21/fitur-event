<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{$title ?? 'Sistem Inkubasi Bisnis | LPPM Universitas Negeri Yogyakarta'}}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="https://getstisla.com/dist/modules/chocolat/dist/css/chocolat.css"> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <link rel="shortcut icon" href="http://siskubisdemo.com/theme/images/logo.png" type="image/png" />
    @livewireStyles
    {{-- <script src="{{asset('js/app.js')}}" defer></script> --}}
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
</head>

<body class="layout-3">

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="container">
                    <div class="align-self-center">
                        <img style="width:50px; font-weight: bold; display: inline;"
                            src="http://siskubisdemo.com/theme/images/logo.png" alt="alt">
                        <a href="/" class="navbar-brand ml-2 text-warning" style="font-size: 20px">SISKUBIS</a>
                    </div>
                    {{--  sidebar-gone-hide --}}
                    <div class="navbar-nav">
                        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i
                                class="fas fa-bars"></i></a>
                    </div>  
                    @auth
                    <ul class="navbar-nav navbar-right ">
                        <li class="dropdown dropdown-list-toggle">
                            <a href="#" data-toggle="dropdown"
                                {{-- class="nav-link dropdown-toggle nav-link-lg nav-link-user"> --}}
                                class="nav-link notification-toggle nav-link-lg beep">
                                <img alt="image" style="height: 25px" src="../assets/img/avatar/avatar-1.png"
                                    class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block">{{Auth::user()->name ?? ''}}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                {{-- <div class="dropdown-title">Logged in 5 min ago</div>
                                <a href="features-profile.html" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <a href="features-activities.html" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Activities
                                </a>
                                <a href="features-settings.html" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> Settings
                                </a> --}}
                                {{-- <div class="dropdown-divider"></div> --}}
                                 <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </div>
                        </li>
                    </ul>
                    @endauth
                </div>

            </nav>
            <nav class="navbar navbar-secondary navbar-expand-lg main-navbar">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ (request()->is('/')) ? ' active':'' }}">
                            <a href="/" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                        </li>
                        <li class="nav-item{{ (request()->is('event*')) ? ' active':'' }}">
                            <a href="{{route('event.front')}}" class="nav-link"><i
                                    class="far fa-calendar-alt"></i><span>Event Siskubis</span></a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link"><i class="fas fa-user-lock"></i><span> Login </span></a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    @yield('body')
    <div class=" mb-3">
        <footer class="main-footer bg-light p-3">
            <div class="footer-left">
                Copyright &copy; 2022
            </div>
            <div class="footer-right">
                <div class="bullet"></div> Design By :  <STrong class="text-primary">Hanafi</STrong>
            </div>
        </footer>
    </div>



    <!-- General JS Scripts -->
    <script defer src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script defer src="{{asset('/assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    {{-- <script defer src="https://getstisla.com/dist/modules/chocolat/dist/js/jquery.chocolat.min.js"></script> --}}
    {{-- <script defer src="https://getstisla.com/dist/modules/jquery-ui/jquery-ui.min.js"></script> --}}
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script defer src="{{asset('assets/js/scripts.js')}}"></script>
    {{-- <script defer src="{{asset('asset/js/custom.js')}}"></script> --}}
    @livewireScripts    
</body>

</html>
