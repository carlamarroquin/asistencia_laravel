﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Control de Asistencia</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.ico"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    {!!Html::style('plugins/bootstrap/css/bootstrap.css')!!}

    {!!Html::style('plugins/node-waves/waves.css')!!}
    {!!Html::style('plugins/animate-css/animate.css')!!}
    {!!Html::style('css/style.css')!!}
    {!!Html::style('css/themes/all-themes.css')!!}
    {!!Html::style('plugins/datatable/css/bootstrap.datatable.min.css')!!}
    {!!Html::style('bootstrap-daterangepicker/daterangepicker.css')!!}
  
  {!!Html::style('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')!!}
 {!!Html::style('bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')!!}
 {!!Html::style('clockpicker/dist/bootstrap-clockpicker.min.css')!!}
 
    
  
    @yield('css')
    <!-- Bootstrap Core Css 
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

     Waves Effect Css 
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

     Morris Chart Css
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    Custom Css 
    <link href="css/style.css" rel="stylesheet">

    <link href="css/themes/all-themes.css" rel="stylesheet" />-->
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
        @include('layouts.top-navbar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
            @include('layouts.left-sidebar')
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2></h2>
            </div>
          @yield('content')
        </div>
        <!-- Footer 
        <footer>
            <div class="legal" id="footer" align="center">
                <div class="copyright">
                    &copy; 2016 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.4
                </div>
            </div>
        </footer>
        -->
            <!-- #Footer -->
    </section>

    {!!Html::script('plugins/jquery/jquery.min.js')!!}
    {!!Html::script('plugins/bootstrap/js/bootstrap.js')!!}
    {!!Html::script('plugins/jquery-slimscroll/jquery.slimscroll.js')!!}
    {!!Html::script('plugins/node-waves/waves.js')!!}

{!!Html::script('plugins/datatable/js/jquery.dataTables.min.js') !!}
{!!Html::script('plugins/datatable/js/bootstrap.datatable.js') !!}
    
    {!!Html::script('js/admin.js')!!}
    {!!Html::script('bootstrap-daterangepicker/daterangepicker.js') !!}
   {!!Html::script('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
   {!!Html::script('js/forms-pickers.js')!!}
   
   {!!Html::script('bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')!!}
   {!!Html::script('clockpicker/dist/jquery-clockpicker.min.js')!!}
    {!!Html::script('moment/moment.js')!!}
         

      @yield('js')
    <!-- Jquery Core Js 
    
    <script src="plugins/jquery/jquery.min.js"></script>
     Bootstrap Core Js 
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
     Select Plugin Js 
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
     Slimscroll Plugin Js 
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <script src="plugins/node-waves/waves.js"></script>
    
    <script src="js/admin.js"></script>-->
</body>

</html>