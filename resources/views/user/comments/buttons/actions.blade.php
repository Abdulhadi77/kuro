
 <div class="btn-group">
	<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> {{ trans('admin.actions') }}</button>
	<span class="caret"></span>
	<span class="sr-only"></span>
	</button>
	<div class="dropdown-menu" role="menu">
		<a href="{{ url('/comments/'.$id)}}" class="dropdown-item" ><i class="fa fa-eye"></i> {{trans('admin.show')}}</a>
		<div class="dropdown-divider"></div>

	</div>
</div>
		