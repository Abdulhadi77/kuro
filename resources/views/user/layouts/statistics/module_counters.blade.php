
<!--comments_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Comment::query()->where('user_id', auth()->user()->id)->count()) }}</h3>
        <p>{{ trans("user.comments") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ url("user/comments") }}" class="small-box-footer">{{ trans("user.comments") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--comments_end-->
<!--reactions_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\Reaction::query()->where('user_id', auth()->user()->id)->count()) }}</h3>
        <p>{{ trans("user.reactions") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ url("user/reactions") }}" class="small-box-footer">{{ trans("user.reactions") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--reactions_end-->

<!--icousers_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ mK(App\Models\IcoUser::query()->where('user_id', auth()->user()->id)->count()) }}</h3>
        <p>{{ trans("user.icousers") }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="{{ url("/user/icousers") }}" class="small-box-footer">{{ trans("user.icousers") }} <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--icousers_end-->
