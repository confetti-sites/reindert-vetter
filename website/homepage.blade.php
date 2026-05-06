@php(newRoot(new \model\homepage))
@section('head_title', 'Confetti CMS')
@section('head_description', 'Confetti CMS lets you build your own white-label CMS with full control over your templates.')
@extends('website.layouts.main')

@section('content')
    @include('website.includes.hero')
    @include('website.includes.usps')
    @include('website.includes.blocks')
    @include('website.includes.newsletter')
    @include('website.includes.cta')
@endsection
