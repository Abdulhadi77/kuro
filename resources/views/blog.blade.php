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
                            <img src="storage/{{$blog->image}}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{route('user.blog.details',$blog->id)}}">{{$blog->title}}</a>
                        </h2>
{{--                        href="{{route('user.blog.details',$blog->id)}}"--}}
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{$blog->created_at}}">{{$blog->created_at}}</time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="{{route('user.blog.details',$blog->id)}}  >{{$blog->comments->count()}}</a></li>
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
                            <div class="read-more">
                                <a href="{{route('user.blog.details',$blog->id)}}">Read More</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->

                    @endforeach
{{--                    <div class="blog-pagination">--}}
{{--                        <ul class="justify-content-center">--}}
{{--                            <li><a href="#">1</a></li>--}}
{{--                            <li class="active"><a href="#">2</a></li>--}}
{{--                            <li><a href="#">3</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                        {!! $blogs->links() !!}

                </div><!-- End blog entries list -->

                <div class="col-lg-4">





          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

@endsection
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
        <script src="{{asset('assets/js/list.js')}}"></script>
{{--        <script>--}}
{{--            window.onload = async function () {--}}
{{--                if (window.ethereum) {--}}
{{--                    var accounts = await ethereum.request({ method: 'eth_requestAccounts' });--}}
{{--                    var currentAddress = accounts[0];--}}
{{--                    web3 = new Web3(window.ethereum);--}}
{{--                    var kuro_balance = await web3.eth.getBalance('0xA6fB39D69b09ECdc1a8b5f829DF11a40B7742603');--}}
{{--                   console.log(kuro_balance)--}}
{{--                } else {--}}
{{--                    console.log("Please connect with metamask");--}}
{{--                }--}}
{{--            }--}}

{{--        </script>--}}

