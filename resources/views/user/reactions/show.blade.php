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
				<a href="{{url('reactions')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('user.show_all')}}</a>

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
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12">
				<b>{{trans('user.id')}} :</b> {{$reactions->id}}
			</div>
			<div class="clearfix"></div>
			<hr />

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('user.like')}} :</b>
				{!! $reactions->like !!}
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('user.dislike')}} :</b>
				{!! $reactions->dislike !!}
			</div>

			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection