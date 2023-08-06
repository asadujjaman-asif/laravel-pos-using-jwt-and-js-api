@extends('dashboardMain')
@section('title')
Dashboard
@endsection
@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        @include('components.dashboard.home.welcome')
        @include('components.dashboard.home.notifications')             
        @include('components.dashboard.home.history') 
        <!-- /. ROW  -->
        @include('components.dashboard.home.sales-chart') 
        <!-- /. ROW  -->
        @include('components.dashboard.home.inbox') 
        <!-- /. ROW  -->
        @include('components.dashboard.home.chat')    
        <!-- /. ROW  -->           
    </div>
        <!-- /. PAGE INNER  -->
</div>
@endsection