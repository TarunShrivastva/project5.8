@extends('master_layouts.master')

@section('content')
	@include('master_layouts.featured_post')
@endsection

@section('second_section')
	{!! $homeLatestSection !!}
@endsection
@section('second_side_section')
	{!! $howToArticles !!}
@endsection
@section('news_letter')
	@include('contents.news_letter')
@endsection
@section('third_section')
	{!! $homePopularSection !!}
@endsection
{{-- @section('third_side_section')
	{!!  !!}
@endsection --}}