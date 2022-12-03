@extends('layouts.master')


@section('title')

  

@endsection


@section('css')



@endsection




@section('content')

  <div class="container">


 
    <div class="row d-flex pt-5">

 
  
      <div class="col" style="justify-content:center;">


      <div class="col" >

 <h2 class="entry-title" >
     {{$ICO->status}}
    </h2>

    <div class="entry-img">
      <img src="storage/{{$ICO->image}}" alt="" class="img-fluid">
    </div>

   


    <div class="entry-content">
      <p>
        {{$ICO->description}}
      </p>
  

 



  <div class="example" id="example1" value="{{$ICO->open_date}}">


    <div id="flipdown" class="flipdown"></div>
   
  </div>
 
</div>
  
</div>
   
 
  </div></div>



  
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
