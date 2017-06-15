<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {!! Html::style( asset('css/bootstrap.min.css') ) !!}
    {!! Html::style( asset('css/font-awesome.min.css') ) !!}
    {!! Html::style( asset('css/app.css') ) !!}
    {!! Html::style( asset('css/AdminLTE.min.css') ) !!}
    {!! Html::style( asset('css/skin-purple-light.min.css') ) !!}
    {!! Html::style( asset('css/admin.css') ) !!}

    {!! Html::script( asset('js/jquery-3.2.1.min.js') ) !!}
    {!! Html::script( asset('js/app.js') ) !!}
    {!! Html::script( asset('js/app.min.js') ) !!}

    <title>{{trans('m.header')}}</title>
</head>
<body class="hold-transition skin-purple-light">
    <div class="wrapper">
        
        <header class="main-header">@include('admin.layouts.header')</header>

        <aside class="main-sidebar">@include('admin.layouts.aside')</aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer id="main-footer">
            @include('admin.layouts.footer')
        </footer>
    </div>
</body>
</html>