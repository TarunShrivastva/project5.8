@foreach($articles as $article)
<div class="blog-posts-area">
    <!-- Single Featured Post -->
    <div class="single-blog-post featured-post mb-30">
        <div class="post-data">
            <a href="{{ URL::to( 'hi/'.$article->content['content_type_name']. '/' . $article->category['url']) }}" class="post-catagory">{{ $article->category['url'] }}</a>
            <a href="{{ URL::to( 'hi/'.$article->content['content_type_name']. '/' . $article->category['url'] . '/' . $article->alias . '-' . $article->id) }}" class="post-title">
                <h6>{{ $article->title }}</h6>
            </a>
        </div>
        <div class="post-thumb">
            <a href="{{ URL::to( 'hi/'.$article->content['content_type_name']. '/' . $article->category['url'] . '/' . $article->alias . '-' . $article->id) }}"><img src="{{ URL::to('upload/'.$article->image) }}" alt="{{URL::to('uploads/'.$article->image) }}"></a>
        </div>
        <div class="post-data">    
            <div class="post-meta">
                <p class="post-author">By <a href="#">{{ $article->author['author'] }}</a>| Published on {{ date('d-m-Y H:i:s', strtotime($article->updated_at)) }}</p>
                <p class="post-excerp">{{ str_limit(strip_tags($article->description),200) }}</p>
                <!-- Post Like & Post Comment -->
                <div class="d-flex align-items-center">
                    <a href="#" class="post-like"><img src="{{ URL::to('img/core-img/like.png')}}" alt="{{ URL::to('img/core-img/like.png')}}"> <span>392</span></a>
                    <a href="#" class="post-comment"><img src="{{ URL::to('img/core-img/chat.png')}}" alt="{{ URL::to('img/core-img/chat.png')}}"> <span>10</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@if ($single == 0)
    <nav aria-label="Page navigation example">
        <ul class="pagination mt-50">
            {{ $articles->links() }}
        </ul>
    </nav>
@elseif($single == 1)
    @php $article = '' @endphp
    @foreach($articles as $value)
        @php $article = $value @endphp
    @endforeach
    <!-- Comment Area Start -->
    <div class="comment_area clearfix">
        <h5 class="title">{{ count($article->comments) }} Comments</h5>
        <ol>
            @foreach($article->comments as $comment)
            <!-- Single Comment Area -->
            <li class="single_comment_area">
                <!-- Comment Content -->
                <div class="comment-content d-flex">
                    <!-- Comment Author -->
                    {{-- <div class="comment-author">
                        <img src="img/bg-img/30.jpg" alt="author">
                    </div> --}}
                    <!-- Comment Meta -->
                    <div class="comment-meta">
                        <a href="#" class="post-author">{{ $comment->user->name }}</a>
                        <a href="#" class="post-date">
                        {{ ($comment->created_at >= $comment->updated_at)?date('d-M-y', strtotime($comment->created_at)) : date('d-M-y', strtotime($comment->updated_at)) }}
                        </a>
                        <p>{{ $comment->comment }}</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ol>
    </div>
@endif
@if (!(Auth::check()))
                    <div class="contact-form-area">    
                        <div class="post-a-comment-area section-padding-80-0">
                            <h4>Login For a comment</h4>    
                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <form action="{{ route('login') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12 col-lg-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input type="email" class="form-control" id="email" placeholder="Email*" name="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <p style="color:red">{{ $errors->first('email') }}</p>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-12 col-lg-6{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <p style="color:red">{{ $errors->first('password') }}</p>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn newspaper-btn mt-30 w-100" type="submit">Login To Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="contact-form-area">    
                        <div class="post-a-comment-area section-padding-80-0">
                            <h4>Leave a comment</h4>    
                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <form action="{{ route('add_comment',['article_id' => $articles->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea name="comment" class="form-control" id="comment" cols="30" rows="10" placeholder="Comment"></textarea>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn newspaper-btn mt-30 w-100" type="submit">Add Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                    
                @endif