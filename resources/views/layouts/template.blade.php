<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DIGI FOR SDI BJBS">
    <meta name="keywords" content="hrdlive, hris">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href={{asset('local_assets\img\logo\bjbs.png')}} type="image/x-icon">
    <link rel="shortcut icon" href={{asset('local_assets\img\logo\bjbs.png')}} type="image/x-icon">
    <title>{{ config('app.name', 'HRMIS') }}</title>
   
    <!-- Bootstrap css-->
    <link href="/assets/css/puk/bootstrap5.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/puk/bootstrap-icon.css">

    <!-- App css-->
    <link rel="stylesheet" href="/assets/css/core_sdi/color-31.css" media="screen" id="color" >
    <link rel="stylesheet" href="/assets/css/core_sdi/style2.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/core_sdi/data-table.css" />
    <link rel="stylesheet" href="/assets/css/core_sdi/roboto.css"/>

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">
    
  </head>
  <body>
    <!-- sweet alert -->
    {{-- @include('hrdlive.layouts.partials.sweetalert-flashdata') --}}
    <!-- sweet alert end -->

    <!-- Loader starts-->
    @include('hrdlive.layouts.partials.loader')
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      @include('hrdlive.layouts.header')
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        @include('hrdlive.layouts.side-menu')
        <!-- Page Sidebar Ends-->
        <br />
        @yield('body')
        <!-- footer start-->
        {{-- @include('hrdlive.layouts.footer') --}}
      </div>
    </div>
    <!-- latest jquery-->
    <script src="/assets/js/core_sdi/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/core_sdi/sidebar-menu.js"></script>
    <script src="/assets/js/core_sdi/bootstrap5.js"></script>
    <script src="/assets/js/core_sdi/data-table.js"></script>
    


    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="/assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    
    @yield('script')

  </body>
</html>