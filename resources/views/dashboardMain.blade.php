
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
    <link rel="stylesheet" href="{{asset('assets/backend/css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/daterangepicker.css')}}">
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="{{asset('assets/backend/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/backend/js/common.js')}}"></script>
    <script src="{{asset('assets/backend/js/jquery-1.10.2.js')}}"></script>
    <script src="{{asset('assets/backend/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/js/axios.min.js')}}"></script>
    
    
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
      <!-- BOOTSTRAP SCRIPTS -->
      <script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('assets/backend/js/jquery.metisMenu.js')}}"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="{{asset('assets/backend/js/morris/raphael-2.1.0.min.js')}}"></script>
   <script src="{{asset('assets/backend/js/morris/morris.js')}}"></script> 
      <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('assets/backend/js/custom.js')}}"></script>
    <script src="{{asset('assets/backend/js/chosen.jquery.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="{{asset('assets/backend/js/daterangepicker.min.js')}}"></script>

    <script type="text/javascript">
      $(".chosen-select").chosen({
          no_results_text: "Oops, nothing found!",
          width: "100%",
          height: "40px",
        }
      );
      $(".chosen-single").css("height", "40px");
      $(".chosen-single").css("line-height", "40px");
  </script>
  <script>
  $(function() {
    $('.date').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      minYear: 2000,
      maxYear: parseInt(moment().format('YYYY'),10),
      locale: {
      format: 'DD-MM-YYYY',
    }
    });
  });
  </script>
</body>
</html>
