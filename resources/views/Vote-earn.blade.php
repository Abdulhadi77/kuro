
@extends('layouts.master')


@section('title')



@endsection


@section('css')



@endsection




@section('content')




    {{--    <section id="team" class="team">--}}

    {{--        <div class="container" data-aos="fade-up">--}}

    {{--            <header class="section-header">--}}

    {{--                <p>Vote To Earn</p>--}}
    {{--            </header>--}}
    {{--            @if( !auth()->user())--}}
    {{--                <div class="row gy-6">--}}
    {{--                    @foreach($vote as $one)--}}
    {{--                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">--}}
    {{--                            <div class="member">--}}
    {{--                                <div class="member-img">--}}
    {{--                                    <img src="{{ asset('storage/'.$one->image)  }}" class="img-fluid" alt="">--}}

    {{--                                </div>--}}
    {{--                                <div class="member-info">--}}
    {{--                                    <h4>{{$one->type}}</h4>--}}
    {{--                                                               --}}
    {{--                                    <p> {!!$one->description!!}</p>--}}

    {{--                                        <a  href="{{route('user_join_vote_plan',$one->id)}}" class="mt-auto btn btn-primary">Join</a>--}}

    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <br>--}}

    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--            @elseif(auth()->user()->vote_plan_id == null)--}}
    {{--                <div class="row gy-6">--}}
    {{--                    @foreach($vote as $one)--}}
    {{--                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">--}}
    {{--                            <div class="member">--}}
    {{--                                <div class="member-img">--}}
    {{--                                    <img src="{{ asset('storage/'.$one->image)  }}" class="img-fluid" alt="">--}}

    {{--                                </div>--}}
    {{--                                <div class="member-info">--}}
    {{--                                    <h4>{{$one->type}}</h4>--}}

    {{--                                    <p> {!!$one->description!!}</p>--}}
    {{--                                    <a href="{{route('user_join_vote_plan',$one->id)}}" class=" btn btn-primary">Join</a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <br>--}}

    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--            @else--}}
    {{--                <div class="row gy-6">--}}
    {{--                    <div style="margin-right: 143px" class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">--}}

    {{--                    </div>--}}
    {{--                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">--}}
    {{--                        <div class="member">--}}
    {{--                            <div class="member-img">--}}
    {{--                                <img src="{{ asset('storage/'.\App\Models\VotePlan::find(auth()->user()->vote_plan_id)->image)  }}" class="img-fluid" alt="">--}}

    {{--                            </div>--}}
    {{--                            <div class="member-info">--}}
    {{--                                <h4>{{\App\Models\VotePlan::find(auth()->user()->vote_plan_id)->type}}</h4>--}}

    {{--                                <p>{!! \App\Models\VotePlan::find(auth()->user()->vote_plan_id)->description  !!}</p>--}}
    {{--                                <h1  class="btn btn-warning">Joined </h1>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                    <br>--}}


    {{--                </div>--}}
    {{--            @endif--}}

    {{--        </div>--}}

    {{--    </section><!-- End Team Section -->--}}



    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <header class="section-header">

                <p>Vote To Earn</p>
            </header>
            @if( !auth()->user())
                <div class="row">
                    @foreach($vote as $one)
                        <div class="col-lg-3">

                            <div class="post-box">
                                <div class="post-img"><img style="height: 279px" src="{{ asset('storage/'.$one->image)  }}" class="img-fluid" alt=""></div>
                                <span class="post-date"> <h4>{{$one->type}}</h4></span>
                                <h3 class="post-title">{!!$one->description!!}</h3>
                                <a href="{{route('user_join_vote_plan',$one->id)}}" class=" btn btn-primary mt-auto">Join</a>
                            </div>

                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                    @endforeach

                </div>
            @elseif(auth()->user()->vote_plan_id == null)
                <div class="row">

                    @foreach($vote as $one)
                        <div class="col-lg-3">

                            <div class="post-box">
                                <div class="post-img"><img style="height: 279px" src="{{ asset('storage/'.$one->image)  }}" class="img-fluid" alt=""></div>
                                <span class="post-date"> <h4>{{$one->type}}</h4></span>
                                <h3 class="post-title">{!!$one->description!!}</h3>
                                <a href="{{route('user_join_vote_plan',$one->id)}}" class=" btn btn-primary mt-auto">Join</a>
                            </div>

                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                    @endforeach


                </div>
            @else
                <div class="row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img"><img style="height: 261px" src="{{ asset('storage/'.\App\Models\VotePlan::find(auth()->user()->vote_plan_id)->image)  }}" class="img-fluid" alt=""></div>
                            <span class="post-date"><h4>{{\App\Models\VotePlan::find(auth()->user()->vote_plan_id)->type}}</h4></span>
                            <h3 class="post-title">{!! \App\Models\VotePlan::find(auth()->user()->vote_plan_id)->description  !!}</h3>
                            <h3 class=" btn btn-success mt-auto">Joined</h3>
                        </div>
                    </div>

                    <div class="col-lg-4">

                    </div>

                </div>

            @endif

        </div>

    </section><!-- End Recent Blog Posts Section -->



@endsection

