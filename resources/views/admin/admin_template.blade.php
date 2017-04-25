<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Starter</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css') }}">
         @yield('extCss')

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


    @include('admin.admin_header')
    @include('admin.admin_aside')

    <div class="content-wrapper">
        <section class="content">
         @yield('pageContent')
        </section>
    </div>

    @include('admin.admin_footer')
    <div class="control-sidebar-bg"></div>
    </div>

    <script src="{{ asset('/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/bower_components/AdminLTE/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('/bower_components/AdminLTE/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
     @yield('extJs')


    </body>
</html>
