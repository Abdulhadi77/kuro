@extends('layouts.app')

@section('content')





<!-- Section: Design Block -->
<section class="login">
    <!-- Jumbotron -->
    <form method="POST" action="{{ route('user.login') }}">
        @csrf
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="my-5 display-3 fw-bold ls-tight">
              The best offer <br />
              <span class="text-primary">for your business</span>
            </h1>
            <p style="color: hsl(217, 10%, 50.8%)">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Eveniet, itaque accusantium odio, soluta, corrupti aliquam
              quibusdam tempora at cupiditate quis eum maiores libero
              veritatis? Dicta facilis sint aliquid ipsum atque?
            </p>
          </div>

          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                <form>
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">


                  <!-- Email input -->

                  <div class="form-outline mb-4">
                          <label class="form-label" for="form3Example3">Email address</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">

                    <label class="form-label" for="form3Example4">Password</label>


                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                  <!-- Checkbox -->
                  <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="form2Example33">
                      remember me
                    </label>
                  </div>

                  <!-- Submit button -->

                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Sign in
                  </button>

                  <div class="form-check d-flex justify-content-center mb-4">
                  @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
                  @endif
                  </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 </form>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->






@endsection
