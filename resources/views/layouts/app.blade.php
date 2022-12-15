<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> </title>

    <!-- Favicons -->

    <link href="storage/{{$settings->icon}}" rel="icon">
    <link href="{{asset('storage/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('storage/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('storage/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('storage/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/assets/vendor/remixicon/remixicon.cs')}}'" rel="stylesheet">
    <link href="{{asset('storage/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('storage/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('storage/assets/test.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('storage/assets/css/flipdown/flipdown.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('storage/assets/css/style.css')}}">
    <script type="text/javascript" src="{{asset('storage/assets/js/flipdown/flipdown.js')}}"></script>
    <script type="text/javascript" src="{{asset('storage/assets/js/main.js')}}"></script>

</head>
<body>
<header id="header" class="header fixed-top">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{route('home')}}" class="logo d-flex align-items-center">
            <img src="storage/{{$settings->logo}}" alt="">
            <span>KURO</span>
        </a>


        <nav id="navbar" class="navbar">







            <!-- Right Side Of Navbar -->
            <ul >
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li >
                            <a class="getstarted scrollto" href="{{ route('login') }}">{{ trans('auth.login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li >
                            <a class="getstarted scrollto" href="{{ route('register') }}">{{ trans('auth.register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="getstarted scrollto"dropdown-toggle  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>

        </nav>
    </div>
</header>
<div id="app ">
    <main class="py-4">
        @yield('content')

    </main>
</div>



<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    {{--
        <div class="footer-newsletter">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-center">
                <h4>Our Newsletter</h4>
                <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
              </div>
              <div class="col-lg-6">
                <form action="" method="post">
                  <input type="email" name="email"><input type="submit" value="Subscribe">
                </form>
              </div>
            </div>
          </div>
        </div> --}}

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="{{route('home')}}" class="logo d-flex align-items-center">
                        <img src="storage/{{$settings->logo}}" alt="">
                        <span>KURO</span>
                    </a>
                    <br>
                    <p>KURO is a cryptocurrency that supports youth projects around the world and provides humanitarian and educational assistance to bring the world to a higher level of cooperation. KURO also aims to improve token utility by lunching ecosystem projects that help those in need to get life basics.</p>
                    <div class="social-links mt-3">
                        @foreach ($socials as $social)

                            <a href="{{$social->link}}" class="{{$social->name}}"><i class="bi bi-{{$social->name}}"></i></a>

                        @endforeach
                        {{-- <a href="{{$social->link}}" class="{{$social->name}}"><i class="bi bi-newspaper"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-3 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="/">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{route('blog')}}">Blogs</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{route('vote')}}">Vote To Earn</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{route('Beteam')}}">Be from our team</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{route('ICO')}}">ICO</a></li>
                    </ul>
                </div>


                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>

                        <strong>Email </strong> <a href="mailto:{{$settings->email}}" style = "color:black">
                            {{$settings->email}} </a> <br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            All Rights Reserved
            Designed by <strong><span>{{$settings->sitename_en}}</span></strong> Team.<br>
            &copy;Copyright {{$settings->sitename_en}}.
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->

        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="{{asset('storage/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('storage/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('storage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('storage/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('storage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('storage/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('storage/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('storage/assets/js/main.js')}}"></script>
<script src="{{asset('assets/blogs-list.js')}}"></script>
</body>


</html>
