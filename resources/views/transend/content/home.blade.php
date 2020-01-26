@extends('master_layouts.master')
@section('first_section')
	{!! $homeRecentSection !!}
@endsection
@section('first_side_section')
	{!! $trendingArticles  !!}
@endsection

@section('second_section')
	{!! $homeLatestSection !!}
@endsection
@section('second_side_section')
	{!! $howToArticles !!}
@endsection

@section('third_section')
	{!! $homePopularSection !!}
@endsection
{{-- @section('third_side_section')
	{!!  !!}
@endsection --}}