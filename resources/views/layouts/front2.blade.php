<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Inkubasi Bisnis | LPPM Universitas Negeri Yogyakarta</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link  rel="shortcut icon" href="http://siskubisdemo.com/theme/images/logo.png" type="image/png" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend2/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend2/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend2/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend2/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend2/vendor/aos/aos.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend2/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="https://getstisla.com/dist/modules/chocolat/dist/css/chocolat.css"> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    @livewireStyles
    <script src="{{asset('js/app.js')}}" defer></script>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i> <a href="mailto:lppm@uny.ac.id">lppm@uny.ac.id</a>
                <i class="icofont-phone"></i> (0274) 550839, (0274) 518617
            </div>
            <div class="social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="skype"><i class="icofont-skype"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"> <img src="http://siskubisdemo.com/theme/images/logo.png" alt="" srcset=""><a class="ml-2" href="/">Siskubis<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="frontend2/img/logo.png" alt=""></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="{{ (request()->is('/')) ? 'active':'' }}"><a href="/">Home</a></li>
                    <li class="{{ (request()->is('event*')) ? 'active':'' }}"><a data href="{{route('event.front')}}"
                            class="">Events</a></li>
                    <li class="drop-down"><a href="#">My Account</a>
                        <ul>
                            @if (Route::has('login'))
                            @auth
                            <li><a href="{{ route('dashboard') }}" data-turbolinks="false">Dashboard</a></li>
                            <li>
                                <a href="" data-turbolinks="false"
                                    onclick="event.preventDefault();$('#form-logout').submit();">Logout</a></li>
                            <form action="{{ route('logout') }}" id="form-logout" method="POST">@csrf</form>
                            @else
                            <li><a href="{{ route('login') }}" data-turbolinks="false">Login</a></li>
                            {{-- <li><a href="{{ route('register') }}">Register</a>
                    </li> --}}
                    @endauth
                    @endif
                </ul>
                </li>

                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->


    <!-- ======= Hero Section ======= -->
    @yield('body')

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>By subscribing you will receive new articles in your email.</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>SISKUBIS - UNY<span>.</span></h3>
                        <p>
                            Karang Malang, Yogyakarta, <br>
                            Indonesia<br>
                            Kode Pos : 55281 <br><br>
                            <strong>Phone:</strong> (0274) 586168, (0274) 550839<br>
                            <strong>Email:</strong> lppm@uny.ac.id<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Programs</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Ikuti social media kami untuk mendapatkan informasi terupdate dari kami.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
            </div>
            <div class="credits">

                Designed by <a href="#">Tugas Akhir</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script defer src="{{ asset('frontend2/vendor/jquery/jquery.min.js') }}"></script>
    <script defer src="{{ asset('frontend2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script defer src="{{ asset('frontend2/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script defer src="{{ asset('frontend2/vendor/php-email-form/validate.js') }}"></script>
    <script defer src="{{ asset('frontend2/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script defer src="{{ asset('frontend2/vendor/counterup/counterup.min.js') }}"></script>
    <script defer src="{{ asset('frontend2/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script defer src="{{ asset('frontend2/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script defer src="{{ asset('frontend2/vendor/venobox/venobox.min.js') }}"></script>
    <script defer src="{{ asset('frontend2/vendor/aos/aos.js') }}"></script>
    {{-- 
     <script defer src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
    <!-- Template Main JS File -->
    <script defer src="{{ asset('frontend2/js/main.js') }}"></script>
    <script defer src="{{asset('assets/js/scripts.js')}}"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>

</html>
