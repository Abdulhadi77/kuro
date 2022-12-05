


<!--======================================
        START HEADER AREA
    ======================================-->
    <header id="header" class="header fixed-top">
      <script src="{{ asset('js/app.js') }}" defer></script>
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="index.html" class="logo d-flex align-items-center">
        <img src="storage/{{$settings->logo}}" alt="">
            <span>KURO</span>
          </a>

          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="{{route('home')}}">Home</a></li>

              <li><a class="nav-link scrollto" href="{{route('vote')}}">Vote To Earn</a></li>
              <li><a class="nav-link scrollto" href="{{route('Beteam')}}">Be from our team </a></li>
              <li><a class="nav-link scrollto" href="{{route('ICO')}}">ICO</a></li>
              <li><a href="{{route('blog')}}">Blog</a></li>



              @if (auth()->user())
                <li><a class="getstarted scrollto" href="{{route('user.dashboard')}}">Dashboard</a></li>
                @if(!auth()->user()->eth_address)
                  <li>
                    <x-primary-button  class="getstarted scrollto" id="metamask-login"
                      data-signature-url="{{ route('metamask.signature') }}"
                      data-authenticate-url="{{ route('metamask.authenticate') }}"
                      data-redirect-url="{{ route('home') }}">
                        Connect Wallet
                    </x-primary-button>
                  </li>
                @endif
                <li class="nav-item d-none d-sm-inline-block">
                  <a href="{{ route('web.logout') }}" class="getstarted scrollto"><i class="nav-icon fas fa-sign-out-alt"></i>  Logout </a>

                </li>
              @else
              <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('login') }}"  class="getstarted scrollto"><i class="nav-icon fas fa-sign-out-alt"></i>  Login </a>

              </li>
              @endif


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
      </header><!-- End Header -->
<!--======================================
        END HEADER AREA
======================================-->




