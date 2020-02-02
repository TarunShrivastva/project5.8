<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>The News Paper - News &amp; Lifestyle Magazine Template</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ URL::to('img/core-img/favicon.ico') }}">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ URL::to('style.css') }}">
</head>
<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        @include('master_layouts.header')
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
        @include('master_layouts.ad')
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Featured Post Area Start ##### -->
        @yield('content')
    <!-- ##### Featured Post Area End ##### -->
    <!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    @yield('second_section')
                    {{-- @include('master_layouts.second_section') --}}
                </div>
                <div class="col-12 col-lg-4">
                    @yield('second_side_section')
                    {{-- @include('master_layouts.second_side_section') --}}
                    @yield('news_letter')
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Popular News Area End ##### -->

    <!-- ##### Video Post Area Start ##### -->
    {{-- @include('master_layouts.video_section') --}}
    <!-- ##### Video Post Area End ##### -->

    <!-- ##### Editorial Post Area Start ##### -->
    <div class="editors-pick-post-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <!-- Editors Pick -->
                <div class="col-12 col-md-7 col-lg-9">
                    @yield('third_section')
                    {{-- @include('master_layouts.third_section') --}}
                </div>
                <!-- World News -->
                <div class="col-12 col-md-5 col-lg-3">
                    @yield('third_side_section')
                    {{-- @include('master_layouts.third_side_section') --}}
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Editorial Post Area End ##### -->

    <!-- ##### Footer Add Area Start ##### -->
        {{-- @include('master_layouts.footer_ad') --}}
    <!-- ##### Footer Add Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
        @include('master_layouts.footer')
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ URL::to('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ URL::to('js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ URL::to('js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ URL::to('js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ URL::to('js/active.js') }}"></script>
</body>

</html>