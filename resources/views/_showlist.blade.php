
@section('main')

    @foreach($comments as $one)
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





@stop
