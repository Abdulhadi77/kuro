@extends('user.index')
@section('content')
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<a>{{!empty($title)?$title:''}}</a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{url('user/voteplans')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('user.show_all')}}</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$voteplans->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('user.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>  {{trans('user.ask_del')}} {{trans('user.id')}} ({{$voteplans->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
               'method' => 'DELETE',
               'route' => ['voteplans.destroy', $voteplans->id]
               ]) !!}
                {!! Form::submit(trans('user.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						 <a class="btn btn-default" data-dismiss="modal">{{trans('user.cancel')}}</a>
                {!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@endpush
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12">
				<b>{{trans('user.id')}} :</b> {{$voteplans->id}}
			</div>
			<div class="clearfix"></div>
			<hr />

		

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('user.type')}} :</b>
				{!! $voteplans->type !!}
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<b>{{trans('user.description')}} :</b>
				{!! $voteplans->description !!}
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('user.num_votes_cond')}} :</b>
				{!! $voteplans->num_votes_cond !!}
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('user.kuro_balance_cond')}} :</b>
				{!! $voteplans->kuro_balance_cond !!}
			</div>

			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection