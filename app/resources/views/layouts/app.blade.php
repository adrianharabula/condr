<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>ConDr - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="//s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css">
    <link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300'>
    <link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Playball'>
    <!-- <link href="/Assets/css/datepicker3.css" rel="stylesheet"> -->
    <script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
  <div class="overlay">
      <div id="sticky-anchor"></div>
      <nav id="tf-menu" class="navbar navbar-inverse">
          <div class="container">
              <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand logo hidden-xs hidden-sm" href="/"><i class="fa fa-money fa-custom"></i> Consumer Decision Maker</a>
                    <a class="navbar-brand logo visible-xs visible-sm" href="/"><i class="fa fa-money fa-custom"></i> ConDr</a>
                </div>

                <div id="menu" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="{{ route('home') }}">Home</a></li>
                      <li><a href="{{ route('about') }}">About</a></li>
                      <li><a href="{{ route('products') }}">Products</a></li>
                      <li><a href="{{ route('groups') }}">Groups</a></li>
                      <li><a href="{{ route('statistics') }}">Statistics</a></li>
                      <li><a href="{{ route('contact') }}">Contact</a></li>

                      @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                      @else
                            <li><a href="{{ route('preferences') }}">Preferences</a></li>

                            <li class="dropdown">
                              <a href="#" class="btn btn-primary my-btn my-btn-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My profile <span class="caret"></span></a>
                              <ul class="dropdown-menu my-profile">
                                <li><a href="{{ route('details') }}">Details</a></li>
                                <li><a href="{{ route('mypreferences') }}">Preferences</a></li>
                                <li><a href="{{ route('myproducts') }}">Products</a></li>
                                <li><a href="{{ route('mygroups') }}">Groups</a></li>
                                <li role="separator" class="divider"></li>
                                <li>
                                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
                                  </form>
                                </li>
                              </ul>
                            </li>
                      @endif
                  </ul>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')

    <nav id="tf-footer" class="bg-black white">
        <div class="container">
            <div class="pull-left">
                <p>&copy; <?=date('Y')?> Consumer Decision Maker using <a href="http://themeforces.com/preview/?theme=free-awesomess-portfolio">Awesomess</a> by <a href="https://dribbble.com/jennpereira">Jenn</a> </p>
            </div>
            <div class="pull-right">
                <ul class="social-media list-inline">
                    <li class="hidden-xs"><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="https://github.com/adrianharabula/condr"><span class="fa fa-github"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <script type="text/javascript" src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plusbutton.js') }}"></script>

</body>
</html>
