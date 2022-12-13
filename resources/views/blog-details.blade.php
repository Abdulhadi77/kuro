@extends('layouts.master')


@section('title')



@endsection


@section('css')



@endsection




@section('content')




    <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{route('home')}}">Home</a></li>
          <li><a href="{{route('blog')}}">Blog</a></li>
          <li>Blog Single</li>
        </ol>
        <h2>Blog Single</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{ asset('storage/'.$blog->image)  }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{$blog->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="{{$blog->created_at}}">{{$blog->created_at}}</time></a></li>
                    {{--                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">{{$blog->comments->count()}}</a></li>--}}
                    @if(auth()->user())
                        @if(\App\Models\Reaction::where('user_id',auth()->user()->id)->where('blog_id',$blog->id)->first())
                            @if(\App\Models\Reaction::where('user_id',auth()->user()->id)->where('blog_id',$blog->id)->first()->like)
                                <li  class="d-flex align-items-center"><a class="changeColor" id="addlike" data-action="{{$blog->id}}"  style="color: #005DAA" href="{{route('user.add.like')}}"><iconify-icon icon="uiw:like-o"></iconify-icon></a>
                                    <span id="likes">{{$blog->likes->count()}}</span> </li>

                            @else
                                <li  class="d-flex align-items-center"><a class="changeColor" id="addlike" data-action="{{$blog->id}}"  href="{{route('user.add.like',$blog->id)}}"><iconify-icon icon="uiw:like-o"></iconify-icon></a>
                                    <span id="likes">{{$blog->likes->count()}}</span> </li>
                            @endif
                        @else
                            <li  class="d-flex align-items-center"><a class="changeColor" id="addlike" data-action="{{$blog->id}}"  href="{{route('user.add.like',$blog->id)}}"><iconify-icon icon="uiw:like-o"></iconify-icon></a>
                                <span id="likes">{{$blog->likes->count()}}</span> </li>
                        @endif
                    @else
                        <li  class="d-flex align-items-center"><a class="changeColor" id="addlike" data-action="{{$blog->id}}" href="{{route('user.add.like',$blog->id)}}"><iconify-icon icon="uiw:like-o"></iconify-icon></a>
                            <span id="likes">{{$blog->likes->count()}}</span> </li>
                    @endif

                    @if(auth()->user())
                        @if(\App\Models\Reaction::where('user_id',auth()->user()->id)->where('blog_id',$blog->id)->first())
                            @if(\App\Models\Reaction::where('user_id',auth()->user()->id)->where('blog_id',$blog->id)->first()->dislike)
                                <li   class="d-flex align-items-center"><a class="changeColorDisLike" id="adddislike" data-action="{{$blog->id}}" style="color: #005DAA" href="{{route('user.add.dislike',$blog->id)}}"><iconify-icon icon="uiw:dislike-o"></iconify-icon></a>
                                    <span id="dislikes" >{{$blog->dislikes->count()}}</span></li>

                            @else
                                <li  class="d-flex align-items-center"><a class="changeColorDisLike" id="adddislike" data-action="{{$blog->id}}" href="{{route('user.add.dislike',$blog->id)}}"><iconify-icon icon="uiw:dislike-o"></iconify-icon></a>
                                    <span id="dislikes" >{{$blog->dislikes->count()}}</span></li>
                            @endif
                        @else
                            <li  class="d-flex align-items-center"><a class="changeColorDisLike" id="adddislike" data-action="{{$blog->id}}" href="{{route('user.add.dislike',$blog->id)}}"><iconify-icon icon="uiw:dislike-o"></iconify-icon></a>
                                <span id="dislikes" >{{$blog->dislikes->count()}}</span></li>
                        @endif
                    @else
                        <li  class="d-flex align-items-center"><a class="changeColorDisLike" id="adddislike" data-action="{{$blog->id}}" href="{{route('user.add.dislike',$blog->id)}}"><iconify-icon icon="uiw:dislike-o"></iconify-icon></a>
                            <span id="dislikes" >{{$blog->dislikes->count()}}</span></li>
                    @endif





                </ul>
              </div>

              <div class="entry-content">
                <p>
                    <a href="javascript:;" class="dropdown-item"  data-bs-toggle="modal"
                       data-bs-target="#info-sub" data-desc="{{ $blog->body }}" data-id="{{ $blog->id }}" data-title="{{ $blog->title }}">
                        {!! \Illuminate\Support\Str::limit(strip_tags($blog->body), 80) !!}
                    </a>

                </p>


              </div>

            </article><!-- End blog entry -->

            <div class="blog-comments">

              <h4  class="comments-count"><span id="CommentCount">{{$blog->comments->count()}} </span> Comments</h4>
                <div id="display">
                    @foreach($blog->comments as $one)


                        <div id="comment-{{$one->id}}" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="assets/img/blog/comments-6.jpg" alt=""></div>
                                <div>
                                    <h5><a href="">{{$one->user->name}}</a> </h5>
                                    <time datetime="2020-01-01">{{$one->created_at}}</time>
                                    <p>
                                        {{$one->content}}
                                    </p>
                                </div>
                            </div>

                        </div><!-- End comment #4 -->
                    @endforeach
                </div>


                <div class="reply-form">
                    <h4>Leave a Comment</h4>
                @guest

                <p>You Must Login Before leave Comment * </p>
                @endguest

                    <form action="" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col form-group">
                                <textarea id="comment" name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                            </div>
                        </div>
                        <input hidden id="blog_id" value="{{$blog->id}}" />
                        <button id="addComment" type="submit" class="btn btn-primary">Post Comment</button>

                    </form>

                </div>
            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->


          <div class="col-lg-4">

            <div class="sidebar">

{{--              <h3 class="sidebar-title">Search</h3>--}}
{{--              <div class="sidebar-item search-form">--}}
{{--                <form action="">--}}
{{--                  <input type="text">--}}
{{--                  <button type="submit"><i class="bi bi-search"></i></button>--}}
{{--                </form>--}}
{{--              </div><!-- End sidebar search formn-->--}}



              <h3 class="sidebar-title">Recent Posts</h3>

              <div class="sidebar-item recent-posts">
                @foreach ($recentblog as $blog)

                <div class="post-item clearfix">
                    <img src="storage/{{$blog->image}}"  alt="" height="60px">
                    <h4><a href="{{route('user.blog.details',$blog->id)}}">{{$blog->title}}</a></h4>
                    <time datetime="{{$blog->created_at}}">{{$blog->created_at}}</time>
                </div>

                @endforeach

              </div><!-- End sidebar recent posts-->



            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->
        </div>

      </div>
        <div class="shown-event-ex">
            <div
                class="modal fade text-start"
                id="info-sub"
                tabindex="-1"
                aria-labelledby="myModalLabel22"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title" id="myModalLabel22">Description For:<span id="blog_title"></span></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            {{--                        <span class="la la-exclamation-circle fs-60 text-warning"></span>--}}
                            <h4 class="modal-title fs-19 font-weight-semi-bold  pb-1"
                                id="blog_desc"></h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->



@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
<script src="{{asset('assets/js/list.js')}}"></script>
<script>
    $(document).on('click', '#addComment', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData()
        var blog_id = $('#blog_id').val();
        var comment = $('#comment').val();
        formData.append('blog_id', blog_id);
        formData.append('comment', comment);
        $.ajax({
            url: "{{route('user.add.comment')}}",
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            data: formData,
            success: function (data) {
                if (data.status == true) {
                    $('#display').empty().html(data.content);
                    $('#CommentCount').empty().html(data.commentCount);
                } else {
                }
            }, error: function (reject) {
            }
        });
    });
</script>
<script>
    $(function () {
        'use strict';
        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#info-sub').on('show.bs.modal', function (e) {

            let name = $(e.relatedTarget).data('title');
            let desc = $(e.relatedTarget).data('desc');

            $('#blog_title')[0].innerHTML =  name;
            $('#blog_desc')[0].innerHTML = desc;


        });


    });
</script>
