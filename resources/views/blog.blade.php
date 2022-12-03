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
                <li><a href="index.html">Home</a></li>
                <li>Blog</li>
            </ol>
            <h2>Blog</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    @foreach ($blogs as $blog)
                    <article class="entry">

                        <div class="entry-img">
                            <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{route('user.blog.details',$blog->id)}}">{{$blog->title}}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{$blog->created_at}}">{{$blog->created_at}}</time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="{{route('user.blog.details',$blog->id)}}">{{$blog->comments->count()}}</a></li>
                                @if(auth()->user())
                                    @if(\App\Models\Reaction::where('user_id',auth()->user()->id)->where('blog_id',$blog->id)->first())
                                        @if(\App\Models\Reaction::where('user_id',auth()->user()->id)->where('blog_id',$blog->id)->first()->like)
                                            <li class="d-flex align-items-center"><a style="color: red" href="{{route('user.add.like',$blog->id)}}"><iconify-icon icon="uiw:like-o"></iconify-icon></a>
                                                {{$blog->likes->count()}}</li>

                                        @else
                                            <li class="d-flex align-items-center"><a  href="{{route('user.add.like',$blog->id)}}"><iconify-icon icon="uiw:like-o"></iconify-icon></a>
                                                {{$blog->likes->count()}}</li>
                                        @endif
                                    @else
                                        <li class="d-flex align-items-center"><a  href="{{route('user.add.like',$blog->id)}}"><iconify-icon icon="uiw:like-o"></iconify-icon></a>
                                            {{$blog->likes->count()}}</li>
                                    @endif
                                @else
                                    <li class="d-flex align-items-center"><a  href="{{route('user.add.like',$blog->id)}}"><iconify-icon icon="uiw:like-o"></iconify-icon></a>
                                        {{$blog->likes->count()}}</li>
                                @endif

                                @if(auth()->user())
                                    @if(\App\Models\Reaction::where('user_id',auth()->user()->id)->where('blog_id',$blog->id)->first())
                                        @if(\App\Models\Reaction::where('user_id',auth()->user()->id)->where('blog_id',$blog->id)->first()->dislike)
                                            <li class="d-flex align-items-center"><a style="color: red" href="{{route('user.add.dislike',$blog->id)}}"><iconify-icon icon="uiw:dislike-o"></iconify-icon></a>
                                                {{$blog->dislikes->count()}}</li>

                                        @else
                                            <li class="d-flex align-items-center"><a href="{{route('user.add.dislike',$blog->id)}}"><iconify-icon icon="uiw:dislike-o"></iconify-icon></a>
                                                {{$blog->dislikes->count()}}</li>
                                        @endif
                                    @else
                                        <li class="d-flex align-items-center"><a href="{{route('user.add.dislike',$blog->id)}}"><iconify-icon icon="uiw:dislike-o"></iconify-icon></a>
                                            {{$blog->dislikes->count()}}</li>
                                    @endif
                                @else
                                    <li class="d-flex align-items-center"><a href="{{route('user.add.dislike',$blog->id)}}"><iconify-icon icon="uiw:dislike-o"></iconify-icon></a>
                                        {{$blog->dislikes->count()}}</li>
                                @endif
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {!!$blog->body!!}
                            </p>
                            <div class="read-more">
                                <a href="{{route('user.blog.details',$blog->id)}}">Read More</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->

                    @endforeach
                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div>

                </div><!-- End blog entries list -->




            <h3 class="sidebar-title">Recent Posts</h3>
            
            <div class="sidebar-item recent-posts">
             @foreach ($recentblog as $blog)
              <div class="post-item clearfix">
                <img src="storage/{{$blog->image}}" alt="">
                <h4><a href="{{route('user.blog.details',$blog->id)}}">{{$blog->title}}</a></h4>
                <time datetime="{{$blog->created_at}}">{{$blog->created_at}}</time>
              </div>
              @endforeach
         

            </div><!-- End sidebar recent posts-->

        
       

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

@endsection
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
