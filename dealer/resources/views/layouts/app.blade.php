<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>พ่อค้ารถ | ขายตัดรถมือสอง</title>
    <meta name="keywords" itemprop="keywords" content="ขายตัดรถบ้าน, รถมือสอง, รถบ้าน, ซื้อ ขาย รถมือสอง, ราคารถมือสอง" />
    <meta name="description" itemprop="description" content="พ่อค้ารถ เว็บไซต์ขายตัดรถบ้าน รถมือสอง หนึ่งเดียวในประเทศไทย ที่มาพร้อมระบบบริหารจัดการการขาย และรายงาน" />


    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Custom -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet" type="text/css" >
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.15/angular.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.15/angular-resource.js"></script>
    <script src="{{ asset('assets/angular/booter.js') }}"></script>
    
    <script>
      window.myApp = new AngularBooter('myApp');
    </script>
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

    @include('includes._extra-css')
</head>
<body id="app-layout">
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-left navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        @if (!Auth::guest())
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-search">
          <img src="{{ Auth::user()->avatar }}" class="avatar-logo img-thumbnail">
        </button>
        @endif
        <a class="navbar-brand" href="{{ url('/') }}">
          <span style="font-size:26px;">
          PORKAR<span style="font-weight:900;">ROD</span>
          </span>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          @if (!Auth::guest())
          <li {{{ (Request::is('listing') ? 'class=active' : '') }}}>
            <a href="{{ url('/listing') }}">+ Listing</a>
          </li>
          <li {{{ (Request::is('showroom') ? 'class=active' : '') }}}>
          </li>
          @endif

          @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/register') }}">Register</a></li>
          @else

          <li class="dropdown hidden-xs">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative;">
            <img src="{{ Auth::user()->avatar }}"  class="avatar-logo img-thumbnail">
            </a>

            <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/account/dashboard') }}"><i class="fa fa-btn fa-user"></i>My Account</a></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
      <div id="test2" class="nav-search collapse">
        <div class="search_box">
          <ul class="nav navbar-nav">
            <li {{{ (Request::is('account/*') ? 'class=active' : '') }}}><a href="{{ url('/account/dashboard') }}"><i class="fa fa-btn fa-user"></i>My Account</a></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  @yield('content')
  <toaster-container></toaster-container>
  <footer style="position: absolute;right: 0;bottom: 0;left: 0;padding: 1rem;background-color: #1E1E1E;text-align: center;">
    <div class="container">
      <p class="text-muted">&copy; พ่อค้ารถ.com</p>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
  @include('includes._extra-js')
  <script>
    (function () {
      $('.navbar').on('show.bs.collapse', function () {
        var actives = $(this).find('.collapse.in'),
          hasData;
        if (actives && actives.length) {
          hasData = actives.data('collapse')
          if (hasData && hasData.transitioning) return
          actives.collapse('hide')
          hasData || actives.data('collapse', null)
        }
      });
      myApp.boot();
    })();
  </script>
  </body>
</html>
