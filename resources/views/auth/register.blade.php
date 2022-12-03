@extends('layouts.app')

@section('content')



<section id='register' class='register'>

    

    <!-- Jumbotron -->
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
            
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                          <label class="form-label" for="form3Example1">User Name</label>
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
  
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                          <label class="form-label" for="form3Example2">Type</label>
                          
                          {{-- <input list="browsers" id="type" type="list" > --}}
                          
                        <select name="cars" id="cars" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>
                          @foreach ($types as $type)
                          <option value="{{$type}}">{{$type}}</option>
                              
                          @endforeach
                            
                            </select>
                          
                          @error('type')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                   
                    <label class="form-label" for="form3Example3">Wallet</label>
                  <input id="wallet" type="text" class="form-control @error('wallet') is-invalid @enderror" name="wallet" value="{{ old('wallet') }}" required autocomplete="wallet" autofocus>
  
                  @error('wallet')
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
                    
                    <label class="form-label" for="form3Example4">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
  
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                  </div>

                <div class="form-outline mb-4">
                    
                    <label class="form-label" for="form3Example4">{{ __('Confirm Password') }}</label>
                 
  

              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        
                </div>
  
                  <!-- Checkbox -->
                  <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                    <label class="form-check-label" for="form2Example33">
                      Subscribe to our newsletter
                    </label>
                  </div>
  
                  <div class="form-outline d-flex justify-content-center mb-4">
                  <button type="submit" class="btn btn-primary btn-block ">
                    {{ __('Register') }}
                  </button>
                </div>
                 
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jumbotron -->  
          
  </section>
  <!-- Section: Design Block -->
   
  
  
  



  <script src="{{asset('storage/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('storage/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('storage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('storage/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('storage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('storage/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('storage/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('storage/assets/js/main.js')}}"></script>

@endsection
