<!-- Single Featured Post -->
@foreach($firstModules as $firstModule)    
    <div class="col-12 col-md-6 col-lg-6">
        <div class="single-blog-post featured-post-2">
            <div class="post-thumb">
                <a href="#"><img src="{{ URL::to('/')}}/upload/{{ $firstModule['image'] }}" alt=""></a>
            </div>
            <div class="post-data">
                <a href="{{ URL::to('/').'/hi/'.$firstModule['content'].'/'.$firstModule['category'].'/'.$firstModule['alias'] .'-'.$firstModule['article_id']}}" class="post-catagory">{{ $firstModule['title'] }}</a>
                <div class="post-meta">
                    <a href="{{ URL::to('/').'/hi/'.$firstModule['content'].'/'.$firstModule['category'].'/'.$firstModule['alias'] .'-'.$firstModule['article_id']}}" class="post-title">
                        <h6>{{ str_limit(strip_tags($firstModule['description']),50) }}</h6>
                    </a>
                    <!-- Post Like & Post Comment -->
                    <div class="d-flex align-items-center">
                        <a href="#" class="post-like"><img src="{{ URL::to('img/core-img/like.png')}}" alt=""> <span>392</span></a>
                        <a href="#" class="post-comment"><img src="{{ URL::to('img/core-img/chat.png')}}" alt=""> <span>10</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach