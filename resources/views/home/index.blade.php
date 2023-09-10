@extends('layouts.home')

@section('content')
            @include('home.sections.slider')
            @include('home.sections.category')
            @include('home.sections.banner_with_text')
            @include('home.sections.popular_product')
            @include('home.sections.best_seller')
            @include('home.sections.fetures_with_icon')
@endsection
