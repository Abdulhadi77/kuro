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
                      @if(auth()->user()->eth_address)
                        <li id="kuro_balance" class="list-group-item">Kuro Balance: {{ Auth::user()->kuro_balance }}</li>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

<script>
	var web3 = new Web3(window.ethereum);

	window.data = {!! json_encode(auth()->user()) !!};		
    window.onload = async function () {
      var web3 = new Web3(window.ethereum);
      //alert(window.data);
      let tokenAddress = "0xA6fB39D69b09ECdc1a8b5f829DF11a40B7742603";
      if (window.data.eth_address != null){
        let walletAddress = window.data.eth_address;
        let minABI = [{"inputs":[],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[{"internalType":"address","name":"","type":"address"},{"internalType":"address","name":"","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"value","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"","type":"address"}],"name":"balances","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"value","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"from","type":"address"},{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"value","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"}];

        let contract = new web3.eth.Contract(minABI,tokenAddress);
        kuro_balance = await contract.methods.balanceOf(walletAddress).call();
        kuro_balance = parseFloat(kuro_balance) / 1000000000;
        window.data.kuro_balance = kuro_balance;
        
        //Save kuro_balance in DB
        
        
        //Show kuro_balance in view
        $('#kuro_balance').empty().html(Auth::user()->kuro_balance);
      }
		
    }

</script>
