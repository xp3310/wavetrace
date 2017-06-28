<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @yield('extMeta')

    {!! Html::style( asset('css/bootstrap.min.css') ) !!}
    {!! Html::style( asset('css/font-awesome.min.css') ) !!}
    {!! Html::style( asset('css/element-ui/index.css') ) !!}
    {!! Html::style( asset('css/reset.css') ) !!}
    {!! Html::style( asset('css/admin.css') ) !!}
    @yield('extCss')


    {!! Html::script( asset('js/jquery-3.2.1.min.js') ) !!}
    {!! Html::script( asset('js/vue.min.js') ) !!}
    {!! Html::script( asset('js/element-ui.js') ) !!}
    {!! Html::script( asset('js/vue-resource.min.js') ) !!}
    {!! Html::script( asset('js/my.js') ) !!}

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('extJs')

    <title>{{ trans('admin.site') }}</title>
</head>
<body>
    <div id="app" class="wrapper">

        <header class="main-header">@include('admin.layouts.header')</header>

        <aside class="main-sidebar">@include('admin.aside')</aside>

        <div class="content-wrapper clearfix">
            @yield('content')
        </div>

        <footer id="main-footer">
            @include('admin.layouts.footer')
        </footer>
    </div>
</body>

@yield('vueCustomParam')
<script>


    (function(){
        bnb.vue.run();
    })();

</script>


</html>
