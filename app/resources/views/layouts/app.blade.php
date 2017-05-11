<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ConDr - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css"  href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/fonts/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/responsive.css') }}">
    <link rel=stylesheet href="//s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css">

    <!-- Additional StyleSheets -->
    @stack('styles')

    <!-- Fonts  -->
    <link href='//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
    <script type="text/javascript" src="{{ asset('/js/modernizr.custom.js') }}"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-34549018-9', 'auto');
        ga('send', 'pageview');

    </script>
</head>

<body class="@yield('page-colors')">
    <div id="app">
        @include('includes.navbar')

        @yield('content')
    </div>

    @include('includes.footer')

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="{{ asset('/js/jquery-3.0.0.slim.min.js') }}"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>

    <!-- Additional scripts -->
    @stack('scripts')
</body>
</html>
