@extends('dashboardMain')
@section('title')
Product List
@endsection
@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        @include('components.dashboard.home.welcome')
        @include('components.dashboard.product.product-list')
        @include('components.dashboard.product.product-create')
        @include('components.dashboard.product.product-delete')
        @include('components.dashboard.product.product-update')
        <!-- /. ROW  -->           
    </div>
        <!-- /. PAGE INNER  -->
</div>
@endsection