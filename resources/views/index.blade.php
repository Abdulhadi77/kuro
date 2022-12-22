@extends('layouts.master')


@section('title')



@endsection


@section('css')

<style>
    element.style {
        position: absolute;
        left: 150px;
        top: 0px;
    }
</style>
@endsection




@section('content')

    <br><br><br><br>

    {{--    <section id="portfolio-details" class="portfolio-details">--}}


    {{--        <div class="row gy-12">--}}

    {{--            <div class="col-lg-12">--}}
    {{--                <div class="portfolio-details-slider swiper">--}}
    {{--                    <div class="swiper-wrapper align-items-center">--}}

    {{--                        <div class="swiper-slide">--}}
    {{--                            <img src="storage/assets/img/portfolio/portfolio-1.jpg" alt="">--}}
    {{--                        </div>--}}

    {{--                        <div class="swiper-slide">--}}
    {{--                            <img src="storage/assets/img/portfolio/portfolio-2.jpg" alt="">--}}
    {{--                        </div>--}}

    {{--                        <div class="swiper-slide">--}}
    {{--                            <img src="storage/assets/img/portfolio/portfolio-3.jpg" alt="">--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                    <div class="swiper-pagination"></div>--}}
    {{--                </div>--}}
    {{--            </div>--}}



    {{--        </div>--}}


    {{--    </section><!-- End Portfolio Details Section -->--}}


    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Our Site</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">KURO is a cryptocurrency that supports youth projects around the world and provides humanitarian and educational assistance to bring the world to a higher level of cooperation. KURO also aims to improve token utility by lunching ecosystem projects that help those in need to get life basics</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a target="_blank" href="https://kurocoin.digital/" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Our Main Website</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{asset('storage/assets/img/hero-img.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->



    <main id="main">



        <section id="testimonials" class="testimonials">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <!--<h2>Home</h2>-->
                    <p> Check Our Info Pages  </p>
                </header>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">
                        @foreach ($slides as $slide)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    {{--                              <div class="stars">--}}
                                    {{--                                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>--}}
                                    {{--                              </div>--}}
                                    <p>
                                        <a href="{{url($slide->page->page_name)}}"> <img style="margin-left: -23px" src="{{ asset('storage/'.$slide->image)  }}" class="testimonial-img" alt=""></a>

                                    </p>
                                    <div class="profile mt-auto">
                                        {!! $slide->description !!}
                                        <a href="{{url('/'.$slide->page->page_name)}}"><h3>@isset($slide->page->page_name){{$slide->page->page_name}}@endisset</h3></a>
                                        {{--                                  <h4>Ceo &amp; Founder</h4>--}}
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- End Testimonials Section -->









        <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <!--<h2>Banners</h2>-->
                    <p>Check Our Latest News</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">

                    </div>
                </div>

                <div class="row gy-4 " style=" position: relative; height: auto;justify-content: center"  data-aos="fade-up" data-aos-delay="200">
                    @foreach ($banners as $banner)
                        <div class="col-lg-3 col-md-6  filter-app justify-content-center">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('storage/'.$banner->image)  }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{$banner->created_at}}</h4>
                                    {{--                              <p>{{$banner->description}}</p>--}}
                                    <div class="portfolio-links">
                                        <a href="{{ asset('storage/'.$banner->image)  }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$banner->description}}"><i class="bi bi-plus"></i></a>
                                        {{--                                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                      



                </div>

            </div>

        </section><!-- End Portfolio Section -->


        <!--  You Can Find Us  -->


        <section id="clients" class="clients">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <!--<h2>Our Clients</h2>-->
                    <p>Buy The Token From</p>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        @foreach ($infos as $info)
                            <div class="swiper-slide"><a href="{{$info->url}}"><img src="{{ asset('storage/'.$info->logo)  }}" class="img-fluid" alt=""></a></div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section><!-- End Clients Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <!--<h2>Contact</h2>-->
                    <p>Contact Us</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-3">

                        {{--            <div class="row gy-4">--}}
                        {{--              <div class="col-md-6">--}}
                        {{--                <div class="info-box">--}}
                        {{--                  <i class="bi bi-geo-alt"></i>--}}
                        {{--                  <h3>Address</h3>--}}
                        {{--                  <p>A108 Adam Street,<br>New York, NY 535022</p>--}}
                        {{--                </div>--}}
                        {{--              </div>--}}
                        {{--              <div class="col-md-6">--}}
                        {{--                <div class="info-box">--}}
                        {{--                  <i class="bi bi-telephone"></i>--}}
                        {{--                  <h3>Call Us</h3>--}}
                        {{--                  <p>+1 5589 55488 55<br>+1 6678 254445 41</p>--}}
                        {{--                </div>--}}
                        {{--              </div>--}}
                        {{--              <div class="col-md-6">--}}
                        {{--                <div class="info-box">--}}
                        {{--                  <i class="bi bi-envelope"></i>--}}
                        {{--                  <h3>Email Us</h3>--}}
                        {{--                  <p>{{$settings->email}}</p>--}}
                        {{--                </div>--}}
                        {{--              </div>--}}
                        {{--              <div class="col-md-6">--}}
                        {{--                <div class="info-box">--}}
                        {{--                  <i class="bi bi-clock"></i>--}}
                        {{--                  <h3>Open Hours</h3>--}}
                        {{--                  <p>Monday - Friday<br>9:00AM - 05:00PM</p>--}}
                        {{--                </div>--}}
                        {{--              </div>--}}
                        {{--            </div>--}}

                    </div>

                    <div class="col-lg-6">
                        <form action="{{route('user_send_message')}}" method="post" action="{{route('user_send_message')}}" class="php-email-form">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                                </div>



                                <div class="col-md-12 text-center">


                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </section><!-- End Contact Section -->

    </main><!-- End #main -->




@endsection

@section('js')
    <script src="yall.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", yall);
    </script>

    <script>

        $(document).ready(function(){

            $('#most_registed').owlCarousel({
                loop: false,
                rtl: true,
                items: 3,
                nav: true,
                dots: false,
                smartSpeed: 500,
                autoplay: false,
                margin: 30,
                navText: ["<i class='la la-arrow-left'></i>", "<i class='la la-arrow-right'></i>"],
                responsive:{
                    320:{
                        items: 1,
                    },
                    992:{
                        items: 3,
                    }
                }
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                let business_active = $('#business').hasClass('active');
                let design_active = $('#design').hasClass('active');
                let development_active = $('#development').hasClass('active');
                let drawing_active = $('#drawing').hasClass('active');

                $('#browse_all_cources').prop('hidden', !business_active);
                $('#browse_all_qual_progs').prop('hidden', !design_active);
                $('#browse_all_agency_progs').prop('hidden', !development_active);
                $('#browse_all_trading_progs').prop('hidden', !drawing_active);


            });



        });






        $('.carousel').carousel({
            interval:5000
        })

        $('.carousel .carousel-item').each(function(){
            var minPerSlide = 1;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i=0;i<minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });







    </script>

@endsection
