@php(newRoot(new \model\homepage))

@extends('website.layouts.main')

@section('head_title', 'Homepage')

@section('content')
    @include('website.homepage.hero')
    @include('website.homepage.feature')
{{--    @include('website.homepage.social_proof')--}}
@endsection
