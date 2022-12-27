


<!--======================================
        START HEADER AREA
    ======================================-->
    <header id="header" class="header fixed-top">
{{--      <script src="{{ asset('js/app.js') }}" defer></script>--}}
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <img src="{{ asset('storage/'.$settings->logo)  }}" alt="">
            <span>KURO</span>
          </a>

          <nav id="navbar" class="navbar">
            <ul>
              <li><a id="click1_1" data-id1="1" class="nav-link scrollto " href="{{route('home')}}">Home</a></li>
              <li><a id="click1_2" data-id2="2" class="nav-link scrollto " href="{{route('vote')}}">Vote To Earn</a></li>
              <li><a id="click1_3" data-id3="3" class="nav-link scrollto " href="{{route('Beteam')}}">Join our Team</a></li>
              <li><a id="click1_4" data-id4="4" class="nav-link scrollto " href="{{route('ICO')}}">ICO</a></li>
              <li><a id="click1_5" data-id5="5" class="nav-link scrollto "  href="{{route('blog')}}">Blog</a></li>



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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){

        if($("#click1_1").attr("href")+'/'==window.location.href){
            $("#click1_1").addClass('active')
        }
        else{
            $("#click1_1").removeClass('active');
        }

        if($("#click1_2").attr("href")==window.location.href){

            $("#click1_2").addClass('active')
        }
        else{
            $("#click1_2").removeClass('active');
        }

        if($("#click1_3").attr("href")==window.location.href){

            $("#click1_3").addClass('active')
        }
        else{
            $("#click1_3").removeClass('active');
        }


        if($("#click1_4").attr("href")==window.location.href){

            $("#click1_4").addClass('active')
        }
        else{
            $("#click1_4").removeClass('active');
        }

        if($("#click1_5").attr("href")==window.location.href){

            $("#click1_5").addClass('active')
        }
        else{
            $("#click1_5").removeClass('active');
        }



    });


</script>



