@extends('layouts.website')

@section('content')


@include('website.include.banner')
{{-- @include('website.include.top-blog') --}}
@include('website.include.sectors')
@include('website.include.article')
{{-- @include('website.include.middle-blog') --}}
@include('website.include.project')
{{-- @include('website.include.news') --}}
@endsection