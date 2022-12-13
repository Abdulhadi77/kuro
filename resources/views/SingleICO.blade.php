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

    @if( $ICO->status != 'will_open' )
      <h2 class="entry-title" >
      {{$ICO->status}}
      </h2>
    @else
      <h2 class="entry-title" >
      Will Open
      </h2>
    @endif
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
      @if(\App\Models\IcoUser::where('user_id',auth()->user()->id)->where('i_c_o_id',$ICO->id)->first())
          @if(\App\Models\IcoUser::where('user_id',auth()->user()->id)->where('i_c_o_id',$ICO->id)->first()->status == 'joined')
            <h1>Congrats! You Joined this ICO</h1>
          @elseif(\App\Models\IcoUser::where('user_id',auth()->user()->id)->where('i_c_o_id',$ICO->id)->first()->status == 'pending')
            <h1>Pending</h1>
          @endif
      @else
      <div class="card-body py-5 px-md-5">
        <form method="POST" action="{{ route('user_join_ico') }}">
          {{ csrf_field() }}
          <input type='hidden' name='id' value={{ $ICO->id }}>

          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row d-flex" style="justify-content: center">


          <!-- Amount -->
          <div class="form-outline mb-4">

            <label class="form-label" for="form3Example4">Amount</label>
            <input id="amount" type="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" required autocomplete="amount">

            @error('amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>



          <!-- purchase_method -->
          <div class="form-outline mb-4">

            <label class="form-label" for="form3Example3">Subscription Method</label>
            <select name="purchase_method" id="purchase_method" type="purchase_method" class="form-control @error('purchase_method') is-invalid @enderror" name="purchase_method" value="{{ old('purchase_method') }}" required autocomplete="purchase_method">
          
              <option value="1">{{trans('admin.indoex')}}</option>
              <option value="2">{{trans('admin.pancakeswap')}}</option>
              <option value="3">{{trans('admin.kuro_team')}}</option>
            
            </select>
            @error('purchase_method')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>




          <button type="submit" class="btn btn-primary btn-block mb-4">
          Buy
          </button>
      </form>
      @endif




    </div>
  </div></div>
  </div></div>
@elseif($ICO->status =='will_open')
  <main id="main" style="justify-content:center;">
  <div class="example" id="example1" value="{{$ICO->open_date}}">

    <div id="flipdown" class="flipdown"></div>
  </div>

  </main><!-- End #main -->




  <div class="container">
    <div class="row gx-lg-5 align-items-center"style="justify-content: center;">
    <div class="col-lg-6 mb-5 mb-lg-0">
      <div class="card">
        @if(\App\Models\IcoUser::where('user_id',auth()->user()->id)->where('i_c_o_id',$ICO->id)->first())
          @if(\App\Models\IcoUser::where('user_id',auth()->user()->id)->where('i_c_o_id',$ICO->id)->first()->status == 'joined')
            <h1>Congrats! You Joined this ICO</h1>
          @elseif(\App\Models\IcoUser::where('user_id',auth()->user()->id)->where('i_c_o_id',$ICO->id)->first()->status == 'pending')
            <h1>Pending</h1>
          @endif
        @else
        <div class="card-body py-5 px-md-5">
          <form method="POST" action="{{ route('user_join_ico') }}">
            {{ csrf_field() }}
            <input type='hidden' name='id' value={{ $ICO->id }}>

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row d-flex" style="justify-content: center">

              <h2>Add My Name To The Next ICO</h2>
              

        
            <!-- Amount -->
            <div class="form-outline mb-4">

              <label class="form-label" for="form3Example4">Amount</label>
              <input id="amount" type="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" required autocomplete="amount">

              @error('amount')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>


            <div class="form-outline mb-4">

            


            <!-- purchase_method -->
          <div class="form-outline mb-4">

            <label class="form-label" for="form3Example3">Subscription Method</label>
            <select name="purchase_method" id="purchase_method" type="purchase_method" class="form-control @error('purchase_method') is-invalid @enderror" name="purchase_method" value="{{ old('purchase_method') }}" required autocomplete="purchase_method">
          
              <option value="1">{{trans('admin.indoex')}}</option>
              <option value="2">{{trans('admin.pancakeswap')}}</option>
              <option value="3">{{trans('admin.kuro_team')}}</option>
            
            </select>
            @error('purchase_method')
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
      @endif
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
