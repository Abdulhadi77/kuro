<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

{{--    <div class="footer-newsletter">--}}
{{--      <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--          <div class="col-lg-12 text-center">--}}
{{--            <h4>Our Newsletter</h4>--}}
{{--            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>--}}
{{--          </div>--}}
{{--          <div class="col-lg-6">--}}
{{--            <form action="" method="post">--}}
{{--              <input type="email" name="email"><input type="submit" value="Subscribe">--}}
{{--            </form>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="storage/{{$settings->logo}}" alt="">
              <span>KURO</span>
            </a>
            <br>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              @foreach ($socials as $social)

              <a href="{{$social->link}}" class="{{$social->name}}"><i class="bi bi-{{$social->name}}"></i></a>

               <a href="{{$social->link}}" class="{{$social->name}}"><i class="bi bi-newspaper"></i></a>
               @endforeach

            </div>
          </div>

          <div class="col-lg-3 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">WhitePaper</a></li>
{{--              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>--}}
{{--              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>--}}
{{--              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>--}}
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
        &copy; Copyright <strong><span>FXS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

