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
                <img src="storage/{{$blog->image}}" alt="" class="img-fluid">
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
                    {!!$blog->body!!}
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
                    <p>You Must Login Before leave Comment * </p>
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
