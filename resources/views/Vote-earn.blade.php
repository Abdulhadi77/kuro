{{--@extends('layouts.master')--}}


{{--@section('title')--}}

{{--  --}}

{{--@endsection--}}


{{--@section('css')--}}



{{--@endsection--}}




{{--@section('content')--}}

{{--<section id="pricing" class="pricing">--}}

{{--<div class="container" data-aos="fade-up">--}}

{{--  <header class="section-header">--}}
{{--    <p>Vote To Earn</p>--}}
{{--    <h2>Check our Pricing</h2>--}}
{{--    --}}
{{--  </header>--}}

{{--  <div class="row gy-4" data-aos="fade-left">--}}

{{--    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">--}}
{{--      <div class="box">--}}
{{--        <h3 style="color: #07d5c0;">Free Plan</h3>--}}
{{--        <div class="price"><sup>$</sup>0<span> / mo</span></div>--}}
{{--        <img src="assets/img/pricing-free.png" class="img-fluid" alt="">--}}
{{--        <ul>--}}
{{--          <li>Aida dere</li>--}}
{{--          <li>Nec feugiat nisl</li>--}}
{{--          <li>Nulla at volutpat dola</li>--}}
{{--          <li class="na">Pharetra massa</li>--}}
{{--          <li class="na">Massa ultricies mi</li>--}}
{{--        </ul>--}}
{{--        <a href="#" class="btn-buy">Buy Now</a>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">--}}
{{--      <div class="box">--}}
{{--        <span class="featured">Featured</span>--}}
{{--        <h3 style="color: #65c600;">Starter Plan</h3>--}}
{{--        <div class="price"><sup>$</sup>19<span> / mo</span></div>--}}
{{--        <img src="assets/img/pricing-starter.png" class="img-fluid" alt="">--}}
{{--        <ul>--}}
{{--          <li>Aida dere</li>--}}
{{--          <li>Nec feugiat nisl</li>--}}
{{--          <li>Nulla at volutpat dola</li>--}}
{{--          <li>Pharetra massa</li>--}}
{{--          <li class="na">Massa ultricies mi</li>--}}
{{--        </ul>--}}
{{--        <a href="#" class="btn-buy">Buy Now</a>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">--}}
{{--      <div class="box">--}}
{{--        <h3 style="color: #ff901c;">Business Plan</h3>--}}
{{--        <div class="price"><sup>$</sup>29<span> / mo</span></div>--}}
{{--        <img src="assets/img/pricing-business.png" class="img-fluid" alt="">--}}
{{--        <ul>--}}
{{--          <li>Aida dere</li>--}}
{{--          <li>Nec feugiat nisl</li>--}}
{{--          <li>Nulla at volutpat dola</li>--}}
{{--          <li>Pharetra massa</li>--}}
{{--          <li>Massa ultricies mi</li>--}}
{{--        </ul>--}}
{{--        <a href="#" class="btn-buy">Buy Now</a>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">--}}
{{--      <div class="box">--}}
{{--        <h3 style="color: #ff0071;">Ultimate Plan</h3>--}}
{{--        <div class="price"><sup>$</sup>49<span> / mo</span></div>--}}
{{--        <img src="assets/img/pricing-ultimate.png" class="img-fluid" alt="">--}}
{{--        <ul>--}}
{{--          <li>Aida dere</li>--}}
{{--          <li>Nec feugiat nisl</li>--}}
{{--          <li>Nulla at volutpat dola</li>--}}
{{--          <li>Pharetra massa</li>--}}
{{--          <li>Massa ultricies mi</li>--}}
{{--        </ul>--}}
{{--        <a href="#" class="btn-buy">Buy Now</a>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--  </div>--}}

{{--</div>--}}

{{--</section>--}}

{{--<section id='subscribe' class='subscribe'>--}}

{{--  <form method="POST" action="{{ route('register') }}">--}}
{{--    @csrf--}}

{{--    <div class="row mb-3">--}}
{{--        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--            @error('name')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="row mb-3">--}}
{{--      <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('type') }}</label>--}}

{{--      <div class="col-md-6">--}}
{{--          <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>--}}

{{--          @error('type')--}}
{{--              <span class="invalid-feedback" role="alert">--}}
{{--                  <strong>{{ $message }}</strong>--}}
{{--              </span>--}}
{{--          @enderror--}}
{{--      </div>--}}
{{--  </div>--}}




{{--  <div class="row mb-3">--}}
{{--    <label for="wallet" class="col-md-4 col-form-label text-md-end">{{ __('wallet') }}</label>--}}

{{--    <div class="col-md-6">--}}
{{--        <input id="wallet" type="text" class="form-control @error('wallet') is-invalid @enderror" name="wallet" value="{{ old('wallet') }}" required autocomplete="wallet" autofocus>--}}

{{--        @error('wallet')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                <strong>{{ $message }}</strong>--}}
{{--            </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}



{{--    <div class="row mb-3">--}}
{{--        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--            @error('email')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row mb-3">--}}
{{--        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--            @error('password')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row mb-3">--}}
{{--        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row mb-0">--}}
{{--        <div class="col-md-6 offset-md-4">--}}
{{--            <button type="submit" class="btn btn-primary">--}}
{{--                {{ __('Register') }}--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}



{{--</form>--}}

{{--</section>--}}





{{--  --}}
{{--@endsection--}}
@extends('layouts.master')


@section('title')



@endsection


@section('css')



@endsection




@section('content')

    <section id="pricing" class="pricing">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Vote To Earn</p>

            </header>

            <div class="row gy-4" data-aos="fade-left">
                @foreach($vote as $one)
                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <h3 style="color: #07d5c0;">{{$one->type}}</h3>
                            <img src="assets/img/pricing-free.png" class="img-fluid" alt="">
                            <div class="card">
                                <div class="card-body">

                                    <p class=" card-text">
                                        <a href="javascript:;" class="dropdown-item"  data-bs-toggle="modal"
                                           data-bs-target="#info-sub" data-desc="{{ $one->description }}" data-id="{{ $one->id }}" data-title="{{ $one->type }}">
                                            {!! \Illuminate\Support\Str::limit(strip_tags($one->description), 20) !!}
                                        </a>
                                    </p>

                                </div>
                            </div>
                            <br>
                            <br>
                            {{--@if(\App\Models\User::where('vote_plan_id',$one->id)->first())--}}
                            @if(auth()->user()->vote_plan_id == $one->id)
                                <h1 href="{{route('user_join_vote_plan',$one->id)}}" class="btn btn-warning">Joined </h1>
                            @elseif(!auth()->user()->vote_plan_id)
                                <a href="{{route('user_join_vote_plan',$one->id)}}" class="btn btn-primary">Join</a>
                            @endif
                        </div>
                    </div>

                @endforeach



            </div>

        </div>
        <div class="shown-event-ex">
            <div
                class="modal fade text-start"
                id="info-sub"
                tabindex="-1"
                aria-labelledby="myModalLabel22"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title" id="myModalLabel22">Description For:<span id="blog_title"></span></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            {{--                        <span class="la la-exclamation-circle fs-60 text-warning"></span>--}}
                            <h4 class="modal-title fs-19 font-weight-semi-bold pt-2 pb-1"
                                id="blog_desc"></h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $(function () {
        'use strict';
        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#info-sub').on('show.bs.modal', function (e) {

            let name = $(e.relatedTarget).data('title');
            let desc = $(e.relatedTarget).data('desc');

            $('#blog_title')[0].innerHTML =  name;
            $('#blog_desc')[0].innerHTML = desc;


        });


    });





</script>
