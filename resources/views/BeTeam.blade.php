@extends('layouts.master')


@section('title')



@endsection


@section('css')



@endsection




@section('content')






    <section id="team" class="team">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Join our team</p>
            </header>
            @if( !auth()->user())

                <div class="row gy-4">
                    @foreach($Bfotplane as $one)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="member">
                                <div class="member-img">
                                    <img style="height: 261px;width: 390px" src="{{ asset('storage/'.$one->image)  }}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>{{$one->type}}</h4>


                                    <span style="height: 128px">{!! $one->description  !!}</span>
                                </div>
                                <div>
                                    <a href="{{route('user_join_b_f_o_t_plan',$one->id)}}" class=" btn btn-primary mt-auto">Join</a>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                    @endforeach
                </div>
            @elseif(auth()->user()->b_f_o_t_plan_id == null)
                <div class="row gy-4">
                    @foreach($Bfotplane as $one)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="member">
                                <div class="member-img">
                                    <img style="height: 261px;width: 390px" src="{{ asset('storage/'.$one->image)  }}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>{{$one->type}}</h4>


                                    <span style="height: 128px">{!! $one->description  !!}</span>
                                </div>
                                <div>
                                    <a href="{{route('user_join_b_f_o_t_plan',$one->id)}}" class=" btn btn-primary mt-auto">Join</a>
                                </div>
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
                    <div style="margin-left: 51px" class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

                    </div>
                    <div  class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img style="height: 261px;width: 390px" src="{{ asset('storage/'.\App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->image)  }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>{{\App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->type}}</h4>

                                <span style="height: 128px">{!! \App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->description  !!}</span>
                            </div>
                            <div>
                                <h3  class=" btn btn-success mt-auto">Joined</h3>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

                    </div>
                </div>

            @endif

        </div>

    </section><!-- End Team Section -->

@endsection

