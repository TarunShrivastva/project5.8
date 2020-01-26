<div class="section-heading">
    <h6>{{ __('hi.Latest News') }}</h6>
</div>
<div class="row">
    <!-- Single Post -->
    @foreach($secondModules as $secondModule)
        <div class="col-12 col-md-6">
            <div class="single-blog-post style-3">
                <div class="post-thumb">
                    <a href="#"><img src="{{ URL::to('/')}}/upload/{{ $secondModule['image'] }}" alt=""></a>
                </div>
                <div class="post-data">
                    <a href="{{ URL::to('/').'/hi/'.$secondModule['content'] }}" class="post-catagory">{{ $secondModule['content'] }}</a>
                    <a href="{{ URL::to('/').'/hi/'.$secondModule['content'].'/'.$secondModule['category'].'/'.$secondModule['alias'] .'-'.$secondModule['article_id']}}" class="post-title">
                        <h6>{{ str_limit(strip_tags($secondModule['description']),50) }}</h6>
                    </a>
                    <div class="post-meta d-flex align-items-center">
                        <a href="#" class="post-like"><img src="{{ URL::to('img/core-img/like.png')}}" alt=""> <span>392</span></a>
                        <a href="#" class="post-comment"><img src="{{ URL::to('img/core-img/chat.png')}}" alt=""> <span>10</span></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>          