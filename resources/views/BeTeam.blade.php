@extends('layouts.master')


@section('title')



@endsection


@section('css')



@endsection




@section('content')

{{--    <section id="pricing" class="pricing">--}}

{{--        <div class="container" data-aos="fade-up">--}}

{{--            <header class="section-header">--}}
{{--                <p>Join our Team</p>--}}


{{--            </header>--}}


{{--                @if( !auth()->user())--}}
{{--                    <div class="row gy-6" data-aos="fade-left">--}}
{{--                    @foreach($Bfotplane as $one)--}}

{{--                        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">--}}
{{--                            <div class="box">--}}
{{--                                <h3 style="color: #07d5c0;">{{$one->type}}</h3>--}}
{{--                                <img src="{{ asset('storage/'.$one->image)  }}" class="img-fluid" alt="">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}

{{--                                        <p class=" card-text">--}}
{{--                                            <a href="javascript:;" class="dropdown-item"  data-bs-toggle="modal"--}}
{{--                                               data-bs-target="#info-sub" data-desc="{{ $one->description }}" data-id="{{ $one->id }}" data-title="{{ $one->type }}">--}}
{{--                                                {!! \Illuminate\Support\Str::limit(strip_tags($one->description), 20) !!}--}}
{{--                                            </a>--}}
{{--                                        </p>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                --}}{{--@if(\App\Models\User::where('b_f_o_t_plan_id',$one->id)->first())--}}
{{--                                <a href="{{route('user_join_b_f_o_t_plan',$one->id)}}" class="btn-buy">Join</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    @endforeach--}}
{{--                    </div>--}}
{{--                @elseif(auth()->user()->b_f_o_t_plan_id == null)--}}
{{--                    <div class="row gy-6" data-aos="fade-left">--}}
{{--                    @foreach($Bfotplane as $one)--}}

{{--                                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">--}}
{{--                                    <div class="box">--}}
{{--                                        <h3 style="color: #07d5c0;">{{$one->type}}</h3>--}}
{{--                                        <img src="{{ asset('storage/'.$one->image)  }}" class="img-fluid" alt="">--}}
{{--                                        <div class="card">--}}
{{--                                            <div class="card-body">--}}

{{--                                                <p class=" card-text">--}}
{{--                                                    <a href="javascript:;" class="dropdown-item"  data-bs-toggle="modal"--}}
{{--                                                       data-bs-target="#info-sub" data-desc="{{ $one->description }}" data-id="{{ $one->id }}" data-title="{{ $one->type }}">--}}
{{--                                                        {!! \Illuminate\Support\Str::limit(strip_tags($one->description), 20) !!}--}}
{{--                                                    </a>--}}
{{--                                                </p>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <br>--}}
{{--                                        --}}{{--@if(\App\Models\User::where('b_f_o_t_plan_id',$one->id)->first())--}}
{{--                                        <a href="{{route('user_join_b_f_o_t_plan',$one->id)}}" class="btn-buy">Join</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                    @endforeach--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="row gy-1" data-aos="fade-left">--}}
{{--                        <div style="margin-right: 143px" class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">--}}

{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">--}}
{{--                            <div class="box">--}}
{{--                                <h3 style="color: #07d5c0;">{{\App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->type}}</h3>--}}
{{--                                <img src="{{ asset('storage/'.\App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->image)  }}" class="img-fluid" alt="">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}

{{--                                        <p class=" card-text">--}}
{{--                                            <a href="javascript:;" class="dropdown-item"  data-bs-toggle="modal"--}}
{{--                                               data-bs-target="#info-sub" data-desc="{{ \App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->description }}" data-id="{{ \App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->id }}" data-title="{{\App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->type }}">--}}
{{--                                                {!! \Illuminate\Support\Str::limit(strip_tags(\App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->description), 20) !!}--}}
{{--                                            </a>--}}
{{--                                        </p>--}}

{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <h1  class="btn btn-warning">Joined </h1>--}}

{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                @endif--}}






{{--        </div>--}}
{{--        <div class="shown-event-ex">--}}
{{--            <div--}}
{{--                class="modal fade text-start"--}}
{{--                id="info-sub"--}}
{{--                tabindex="-1"--}}
{{--                aria-labelledby="myModalLabel22"--}}
{{--                aria-hidden="true"--}}
{{--            >--}}
{{--                <div class="modal-dialog modal-dialog-centered">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header">--}}

{{--                            <h4 class="modal-title" id="myModalLabel22">Description For:<span id="blog_title"></span></h4>--}}
{{--                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                    aria-label="Close"></button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}

{{--                            --}}{{--                        <span class="la la-exclamation-circle fs-60 text-warning"></span>--}}
{{--                            <h4 class="modal-title fs-19 font-weight-semi-bold pt-2 pb-1"--}}
{{--                                id="blog_desc"></h4>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-outline-secondary"--}}
{{--                                    data-bs-dismiss="modal">Cancel</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


    <section id="team" class="team">

        <div class="container" data-aos="fade-up">

            <header class="section-header">

                <p>Join our Team</p>
            </header>
            @if( !auth()->user())
            <div class="row gy-4">
                @foreach($Bfotplane as $one)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('storage/'.$one->image)  }}" class="img-fluid" alt="">

                        </div>
                        <div class="member-info">
                            <h4>{{$one->type}}</h4>
{{--                            <span>Chief Executive Officer</span>--}}
                            <p> {!!$one->description!!}</p>
                            <a href="{{route('user_join_b_f_o_t_plan',$one->id)}}" class=" btn btn-primary">Join</a>
                        </div>
                    </div>
                </div>
                    <br>

                @endforeach
            </div>
            @elseif(auth()->user()->b_f_o_t_plan_id == null)
                <div class="row gy-6">
                    @foreach($Bfotplane as $one)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="member">
                                <div class="member-img">
                                    <img src="{{ asset('storage/'.$one->image)  }}" class="img-fluid" alt="">

                                </div>
                                <div class="member-info">
                                    <h4>{{$one->type}}</h4>
{{--                                    <span>Chief Executive Officer</span>--}}
                                    <p> {!!$one->description!!}</p>
                                    <a href="{{route('user_join_b_f_o_t_plan',$one->id)}}" class=" btn btn-primary">Join</a>
                                </div>
                            </div>
                        </div>
                        <br>

                    @endforeach
                </div>
            @else
                <div class="row gy-6">
                    <div style="margin-right: 143px" class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

                    </div>
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="member">
                                <div class="member-img">
                                    <img src="{{ asset('storage/'.\App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->image)  }}" class="img-fluid" alt="">

                                </div>
                                <div class="member-info">
                                    <h4>{{\App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->type}}</h4>

                                    <p>{!! \App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->description  !!}</p>
                                    <h1  class="btn btn-warning">Joined </h1>
                                </div>
                            </div>

                        </div>
                    <br>


                </div>
            @endif

        </div>

    </section><!-- End Team Section -->




@endsection
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>--}}

{{--<script>--}}
{{--    $(function () {--}}
{{--        'use strict';--}}
{{--        $.ajaxSetup({--}}

{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}
{{--        $('#info-sub').on('show.bs.modal', function (e) {--}}

{{--            let name = $(e.relatedTarget).data('title');--}}
{{--            let desc = $(e.relatedTarget).data('desc');--}}

{{--            $('#blog_title')[0].innerHTML =  name;--}}
{{--            $('#blog_desc')[0].innerHTML = desc;--}}


{{--        });--}}


{{--    });--}}





{{--</script>--}}

