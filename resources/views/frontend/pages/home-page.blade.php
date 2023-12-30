@extends('frontend.home')
@section('title')
Home
@endsection
@section('content')

@include('frontend.components.home.slider')
@include('frontend.components.home.popular-categories')
<div class="mb-4"></div><!-- End .mb-4 -->
@include('frontend.components.home.banner')
<div class="mb-3"></div><!-- End .mb-5 -->
@include('frontend.components.home.new-arrivals')
<div class="mb-6"></div><!-- End .mb-6 -->
@include('frontend.components.home.today-deals')
@include('frontend.components.home.deals-&-outlet')
@include('frontend.components.home.our-brand')
@include('frontend.components.home.trending-products')
<div class="mb-5"></div><!-- End .mb-5 -->
<!-- End .container -->
@include('frontend.components.home.recommendate-product')
@include('frontend.components.home.shipping-info')


@endsection