@extends('layouts.master')


@section('title')



@endsection


@section('css')



@endsection




@section('content')

  <div class="container pt-5">



    <div class="row d-flex pt-5">



      <div class="col" style="justify-content:center;">


      <div class="col" >
<center>


 <h2 class="entry-title" >
     {{$ICO->status}}
    </h2>

    <div class="entry-img">
      <img src="storage/{{$ICO->image}}" alt="" class="img-fluid">
    </div>


    <div class="entry-content">
      <p>
          {!!$ICO->description!!}

      </p>

       </center>

@if ($ICO->status =='opened')


    <div class="container">
  <div class="row gx-lg-5 align-items-center"style="justify-content: center;">
  <div class="col-lg-6 mb-5 mb-lg-0">
    <div class="card">
      <div class="card-body py-5 px-md-5">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row d-flex" style="justify-content: center">


            <!-- User Name -->

              <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example2">User Name</label>
                  <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                  @error('user_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>



          <!-- Email input -->
          <div class="form-outline mb-4">

            <label class="form-label" for="form3Example3">Email address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">

            <label class="form-label" for="form3Example4">Balance</label>
            <input id="Balance" type="Balance" class="form-control @error('Balance') is-invalid @enderror" name="Balance" required autocomplete="Balance">

            @error('Balance')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>





          <!-- buy -->
          <div class="form-outline mb-4">

            <label class="form-label" for="form3Example3">Way of buy</label>
            <select name="buy" id="buy" type="buy" class="form-control @error('buy') is-invalid @enderror" name="buy" value="{{ old('buy') }}" required autocomplete="buy">
          
              <option value="1">{{trans('admin.indoex')}}</option>
              <option value="2">{{trans('admin.pancakeswap')}}</option>
              <option value="3">{{trans('admin.kuro_team')}}</option>
            
            </select>
            @error('buy')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>




          <button type="submit" class="btn btn-primary btn-block mb-4">
          Buy
          </button>
      </form>





    </div>
  </div></div>
  </div></div>
@elseif($ICO->status !='opened' && $ICO->open_date > now()->toDateTimeString())
  <main id="main" style="justify-content:center;">
  <div class="example" id="example1" value="{{$ICO->open_date}}">

    <div id="flipdown" class="flipdown"></div>
  </div>

  </main><!-- End #main -->




  <div class="container">
    <div class="row gx-lg-5 align-items-center"style="justify-content: center;">
    <div class="col-lg-6 mb-5 mb-lg-0">
      <div class="card">
        <div class="card-body py-5 px-md-5">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row d-flex" style="justify-content: center">

              <h2>Add My Name To The Next ICO</h2>
              <!-- User Name -->

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example2">User Name</label>
                    <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                    @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



            <!-- Email input -->
            <div class="form-outline mb-4">

              <label class="form-label" for="form3Example3">Email address</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">

              <label class="form-label" for="form3Example4">Balance</label>
              <input id="Balance" type="Balance" class="form-control @error('Balance') is-invalid @enderror" name="Balance" required autocomplete="Balance">

              @error('Balance')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>


            <div class="form-outline mb-4">

              <label class="form-label" for="form3Example3">Way of connection</label>
              <input name="connect" id="connect" type="connect" class="form-control @error('connect') is-invalid @enderror" name="connect" value="{{ old('connect') }}" required autocomplete="connect">

              @error('connect')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>


            <!-- buy -->
            <div class="form-outline mb-4">

              <label class="form-label" for="form3Example3">phone</label>
              <input name="phone" id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

              @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>




            <button type="submit" class="btn btn-primary btn-block mb-4">
            Add
            </button>
        </form>





      </div>
    </div></div>
    </div></div>


 @else
<center>

<div class="entry-content">
      <p>
        Sorry The ICO is closed
      </p>

       </center>


@endif







  </div>
  </div></div>

</div>


  <script>


    let opendate =   new Date(document.getElementById("example1").getAttribute('value')).getTime()/1000;

    document.addEventListener('DOMContentLoaded', () => {

  // Unix timestamp (in seconds) to count down to
  var twoDaysFromNow =   opendate +3600  ;

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
