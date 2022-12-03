@extends('layouts.master')


@section('title')

  

@endsection


@section('css')



@endsection




@section('content')
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
            <h2 class="entry-title">
            <a href="blog-single.html">{{$blog->title}}</a>
          </h2>
          <div class="entry-img">
            <img src="storage/{{$blog->image}}" alt="" class="img-fluid">
          </div>

         

          <div class="entry-meta">
            <ul>
              {{-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li> --}}
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="{{$blog->created_at}}">{{$blog->created_at}}</time></a></li>
              {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">{{$blog->likes}}</a></li> --}}
            </ul>
          </div>

          <div class="entry-content">
            <p>
              {{$blog->body}}
            </p>
            </div>

           
         
              @foreach ($blog->comments as $comment)
                <div class="raw">  <h3>{{$comment->user->name}}: {{$comment->content}}</h3> </div>

              @endforeach
           
          </div>
            <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Search</h3>
            <div class="sidebar-item search-form">
              <form action="">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

           
      

            <h3 class="sidebar-title">Recent Posts</h3>
            
            <div class="sidebar-item recent-posts">
             @foreach ($recentblog as $blog)
              <div class="post-item clearfix">
                <img src="storage/{{$blog->image}}" alt="">
                <h4><a href="blog-single.html">{{$blog->title}}</a></h4>
                <time datetime="2020-01-01">{{$blog->created_at}}</time>
              </div>
              @endforeach
         

            </div><!-- End sidebar recent posts-->

        
       

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->
@endsection
