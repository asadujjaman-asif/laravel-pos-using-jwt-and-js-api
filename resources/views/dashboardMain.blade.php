
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POS | @yield('title')</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{asset('assets/backend/css/bootstrap.css')}}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assets/backend/css/font-awesome.css')}}" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="{{asset('assets/backend/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{asset('assets/backend/css/custom.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/backend/css/loader.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/backend/css/validate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/message.css')}}">
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="{{asset('assets/backend/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/backend/js/axios.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/common.js')}}"></script>
<body>
    
    <div id="wrapper">
       @include('components.dashboard.header-nav')  
           <!-- /. NAV TOP  -->
           @include('components.dashboard.sidebar') 
        <!-- /. NAV SIDE  -->
        @include('components.preloader')
	       @include('components.success-message')
        @yield('content')
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('assets/backend/js/jquery-1.10.2.js')}}"></script>
    
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('assets/backend/js/jquery.metisMenu.js')}}"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="{{asset('assets/backend/js/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/morris/morris.js')}}"></script>
    <script src="{{asset('assets/backend/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/js/dataTables/dataTables.bootstrap.js')}}"></script>
    <script>
            $(document).ready(function () {
                $('.dataTables').dataTable({
                  order:[[0,'desc']],
                  lengthMenu:[5,10,15,20,30,40,50]
                });
            });
    </script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('assets/backend/js/custom.js')}}"></script>
</body>
</html>
