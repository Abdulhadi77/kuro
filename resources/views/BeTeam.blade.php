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
    <h2>Check our Pricing</h2>

  </header>

  <div class="row gy-4" data-aos="fade-left">
 @foreach($Bfotplane as $one)
          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
              <div class="box">
                  <h3 style="color: #07d5c0;">{{$one->type}}</h3>
                  <img src="assets/img/pricing-free.png" class="img-fluid" alt="">
                  <div class="card">
                      <div class="card-body">

                      <p class=" card-text">{!! $one->description  !!}</p>

                      </div>
                  </div>
                  @if(\App\Models\User::where('b_f_o_t_plan_id',$one->id)->first())
                      <h1 href="{{route('user_join_b_f_o_t_plan',$one->id)}}" class="btn btn-warning">Joined</h1>
                  @else
                      <a href="{{route('user_join_b_f_o_t_plan',$one->id)}}" class="btn btn-primary">Join</a>
                  @endif
              </div>
          </div>

      @endforeach



  </div>



</div>

</section>







@endsection

<script>
    $('#info-sub').on('show.bs.modal', function (e) {

        let name = $(e.relatedTarget).data('title');
        let desc = $(e.relatedTarget).data('desc');

        $('#blog_title')[0].innerHTML =  name;
        $('#blog_desc')[0].innerHTML = desc;


    });
</script>
