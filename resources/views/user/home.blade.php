@extends('user.index')

@if(auth()->user())
  @section('content')

  <div class="row">
    <section class="col-lg-12 connectedSortable">
      <div class="card" item_name="statistics">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3">
          <i class="fas fa-calculator mr-1"></i>
          Statistics
          </h3>
          </div><!-- /.card-header -->
            <div class="card-body">
              <div class="row">
            @include('user.layouts.statistics.module_counters')
          </div>
            </div><!-- /.card-body -->
          </div>
    </section>
  </div>


  
  <div class="row">
    <section class="col-lg-12 connectedSortable">
      <div class="card" item_name="your_information">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3">
          <i class="fas fa-calculator mr-1"></i>
          Your Information
          </h3>
          </div><!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
              
                  You are logged in!
              
                  <ul class="list-group mt-3">
                      <li class="list-group-item">Username: {{ Auth::user()->user_name }}</li>
                      <li class="list-group-item">Email: {{ Auth::user()->email }}</li>
                      <li class="list-group-item">Referral link: {{ Auth::user()->referral_link }}</li>
                      <li class="list-group-item">Refferal count: {{ count(Auth::user()->referrals)  ?? '0' }}</li>
                      <li class="list-group-item">Referrer: {{ Auth::user()->referrer->name ?? 'Not Specified' }}</li>
                      @if(auth()->user()->vote_plan_id)
                        <li class="list-group-item">Vote Revenue: {{ Auth::user()->vote_revenue(App\Models\VotePlan::find(auth()->user()->vote_plan_id)->first()) }}</li>
                      @endif
                      @if(auth()->user()->b_f_o_t_plan_id)
                        <li class="list-group-item">BeTeam Revenue: {{ Auth::user()->bfot_revenue(App\Models\BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)->first()) }}</li>
                      @endif

                  </ul>
              </div>
              </div>
            </div><!-- /.card-body -->
          </div>
    </section>
  </div>
  
      <!-- /.row (main row) -->
  @endsection
<!--end if for user -->
@endif