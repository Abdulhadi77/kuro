@extends('layouts.master')


@section('title')



@endsection


@section('css')



@endsection




@section('content')



<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

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
              <a href="{{route('SingleICO',$ICO)}}">Join</a>
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
