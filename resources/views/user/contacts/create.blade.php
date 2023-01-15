@extends('user.index')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>
			{{ !empty($title)?$title:'' }}
			</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{ url('user/contacts') }}"  style="color:#343a40"  class="dropdown-item">
				<i class="fas fa-list"></i> {{ trans('user.show_all') }}</a>
			</div>
		</div>
		</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">

{!! Form::open(['url'=>url('user/contacts'),'id'=>'contacts','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
		{!! Form::label('subject',trans('admin.subject')) !!}
		{!! Form::select('subject',['vote_revenue'=>trans('admin.vote_revenue'),'bfot_revenue'=>trans('admin.bfot_revenue'),],old('subject'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]) !!}
	</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('message',trans('user.message'),['class'=>' control-label']) !!}
            {!! Form::text('message',old('message'),['class'=>'form-control','placeholder'=>trans('user.message')]) !!}
    </div>
</div>

    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('kuro Address',trans('user.Kuro Address'),['class'=>' control-label']) !!}
            {!! Form::text('kuro_address',old('kuro_address'),['class'=>'form-control','placeholder'=>trans('user.Kuro Address')]) !!}
        </div>
    </div>

</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('user.add') }}</button>
<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{ trans('user.add_back') }}</button>
{!! Form::close() !!}	</div>
</div>
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

<script>

    //var web3 = new Web3(window.ethereum);

    window.data = {!! json_encode(Auth::user()) !!};


     // alert(window.data);
      window.onload = async function () {
          var web3 = new Web3(window.ethereum);
       // alert(window.data);
        let tokenAddress = "0xA6fB39D69b09ECdc1a8b5f829DF11a40B7742603";
         // console.log(tokenAddress)
        if (window.data.eth_address != null){
          let walletAddress = window.data.eth_address;
          let minABI = [{"inputs":[],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[{"internalType":"address","name":"","type":"address"},{"internalType":"address","name":"","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"value","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"","type":"address"}],"name":"balances","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"value","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"from","type":"address"},{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"value","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"}];

          let contract = new web3.eth.Contract(minABI,tokenAddress);
          kuro_balance = await contract.methods.balanceOf(walletAddress).call();
          kuro_balance = parseFloat(kuro_balance) / 1000000000;
          window.data.kuro_balance = kuro_balance;


          //Save kuro_balance in DB

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData()
            var user_id =window.data.id;
            var balance = kuro_balance;
            formData.append('user_id', user_id);
            formData.append('balance', balance);
            $.ajax({
                url:'/user/add_balance',
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                data: formData,
                success: function (data) {

                }, error: function (reject) {
                }
            });

          }

      }

</script>
