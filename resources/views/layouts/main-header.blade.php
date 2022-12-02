


<!--======================================
        START HEADER AREA
    ======================================-->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="index.html" class="logo d-flex align-items-center">
        <img src="storage/{{$settings->logo}}" alt="">
            <span>FXS</span>
          </a>

          <nav id="navbar" class="navbar">
            <ul>
              @if (!auth()->user())
              <li><a class="nav-link scrollto active" href="{{route('home')}}">Home</a></li>
              <li><a class="nav-link scrollto" href="{{route('about')}}">About</a></li>
              <li><a class="nav-link scrollto" href="{{route('vote')}}">Vote To Earn</a></li>
              <li><a class="nav-link scrollto" href="{{route('Beteam')}}">Be from our team </a></li>
              <li><a class="nav-link scrollto" href="{{route('ICO')}}">ICO</a></li>
              <li><a href="{{route('blog')}}">Blog</a></li>


              <li><a class="getstarted scrollto" href="{{route('user.getLogin')}}">Get Started</a></li>

              @else
              <li><a class="nav-link scrollto active" href="{{route('home')}}">Home</a></li>
              <li><a class="nav-link scrollto" href="{{route('about')}}">About</a></li>
              <li><a class="nav-link scrollto" href="{{route('vote')}}">Vote To Earn</a></li>
              <li><a class="nav-link scrollto" href="{{route('Beteam')}}">Be from our team </a></li>
              <li><a class="nav-link scrollto" href="{{route('ICO')}}">ICO</a></li>
              <li><a href="{{route('blog')}}">Blog</a></li>
              <li><a class="getstarted scrollto" href="{{route('home')}}">Dashboard</a></li>


              @endif


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
      </header><!-- End Header -->
<!--======================================
        END HEADER AREA
======================================-->




