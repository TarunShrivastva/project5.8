<div class="section-heading">
    <h6>{{ __('hi.Popular News') }}</h6>
</div>
<div class="row">
    @foreach($thirdModules as $thirdModule)
        <!-- Single Post -->
        <div class="col-12 col-lg-4">
            <div class="single-blog-post">
                <div class="post-thumb">
                    <a href="#"><img src="{{ URL::to('/')}}/upload/{{ $thirdModule['image'] }}" alt=""></a>
                </div>
                <div class="post-data">
                    <a href="{{ URL::to('/').'/hi/'.$thirdModule['content'].'/'.$thirdModule['category'].'/'.$thirdModule['alias'] .'-'.$thirdModule['article_id']}}" class="post-title">
                        <h6>{{ $thirdModule['title'] }}</h6>
                    </a>
                    <div class="post-meta">
                        <div class="post-date"><a href="#">{{ $thirdModule['date'] }}</a></div>
                    </div>
                </div>
            </div>
        </div>
      @endforeach  
</div>
                