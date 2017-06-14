<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        @yield('extMeta')

        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/element-ui/index.css') }}">
        @yield('extCss')

        <script src="{{ asset('/js/app.js') }}"></script>

        @yield('extJs')

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>


    <body>
        <div class="wrapper">
            <div class="content-wrapper">
                <section class="content">
                     @yield('pageContent')
                </section>
            </div>
        </div>
    </body>
</html>
