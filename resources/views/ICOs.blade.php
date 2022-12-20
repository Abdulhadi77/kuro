@extends('layouts.master')


@section('title')



@endsection


@section('css')



@endsection




@section('content')



<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
      <header class="section-header">
          <p>ICO</p>

      </header>

    <div class="row pt-5">

      <div class="col-lg-8 entries">
        @foreach ($ICOs as $ICO)


        <article class="entry">

          <div class="entry-img">
            <img src="storage/{{$ICO->image}}" alt="" class="img-fluid">
          </div>

          <h2 class="entry-title">
            <a href="{{route('SingleICO',$ICO)}}">{{$ICO->status}}</a>
          </h2>



          <div class="entry-content">
            <p>
                {!!$ICO->description!!}

            </p>
            <div class="read-more">
              @if($ICO->status == 'closed')
                <h1  class="btn btn-warning">Closed</h1>
                
              @elseif (auth()->user())
                @if(\App\Models\IcoUser::where('user_id',auth()->user()->id)->where('i_c_o_id',$ICO->id)->first())
                  <h1  class="btn btn-warning">Joined</h1>
                @else
                  <a href="{{route('SingleICO',$ICO)}}">Join</a>
                @endif

              @else
                <a href="{{route('SingleICO',$ICO)}}">Join</a>
              @endif
            </div>
          </div>

        </article><!-- End blog entry -->
        @endforeach

      </div></div></div>
</section>






  <script>


    let opendate =   new Date(document.getElementById("example1").getAttribute('value')).getTime()/1000;

    document.addEventListener('DOMContentLoaded', () => {

  // Unix timestamp (in seconds) to count down to
  var twoDaysFromNow =   opendate  ;

  // Set up FlipDown
  var flipdown = new FlipDown(twoDaysFromNow)

    // Start the countdown
    .start()

    // Do something when the countdown ends
    .ifEnded(() => {
      console.log('The countdown has ended!');
    });



  // Show version number
  var ver = document.getElementById('ver');
  ver.innerHTML = flipdown.version;
  });

  </script>


@endsection
