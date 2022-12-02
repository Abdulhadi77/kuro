
 <div class="btn-group">
	<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> {{ trans('user.actions') }}</button>
	<span class="caret"></span>
	<span class="sr-only"></span>
	</button>
	<div class="dropdown-menu" role="menu">
		<a href="{{ url('/voteplans/'.$id)}}" class="dropdown-item" ><i class="fa fa-eye"></i> {{trans('user.show')}}</a>
		<div class="dropdown-divider"></div>
		<a data-toggle="modal" data-target="#delete_record{{$id}}" href="#" class="dropdown-item">
		<i class="fas fa-trash"></i> {{trans('user.delete')}}</a>
	</div>
</div>
<div class="modal fade" id="delete_record{{$id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">{{trans('user.delete')}}</h4>
				<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
				<i class="fa fa-exclamation-triangle"></i> {{trans('user.ask_del')}} {{trans('user.id')}} ({{$id}})
			</div>
			<div class="modal-footer">
				{!! Form::open([
				'method' => 'DELETE',
				'route' => ['voteplans.destroy', $id]
				]) !!}
				{!! Form::submit(trans('user.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
				<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('user.cancel')}}</a>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
		