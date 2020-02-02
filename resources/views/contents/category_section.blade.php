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
@if($single == 0)
    <nav aria-label="Page navigation example">
        <ul class="pagination mt-50">
            {{ $articles->links() }}
        </ul>
    </nav>
@endif