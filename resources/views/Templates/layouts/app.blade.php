<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>traffico | Landing, Responsive &amp; Business Templatee</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{ asset('public/assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{ asset('public/assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('public/assets/css/theme.css')}}" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-4 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="{{ asset('public/assets/img/gallery/logo.png')}}" height="24" alt="..." /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link fw-medium active" aria-current="page" href="{{ route('home') }}">Home</a></li>
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="#aboutUs">About us</a></li>
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="#clients">Clients</a></li>
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="#faq">Faq</a></li>
              @if(!Auth::guard()->check())
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
              @endif
              @if(Auth::guard()->check())
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
              @endif
            </ul>
            <form class="ps-lg-5"><a class="btn btn-primary order-1 order-lg-0" href="#!">CONTACT US</a></form>
          </div>
        </div>
      </nav>
       @yield('content')

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('public/vendors/@popperjs/popper.min.js')}}"></script>
    <script src="{{ asset('public/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/vendors/is/is.min.js')}}"></script>
    <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script> -->
    <script src="{{ asset('public/vendors/fontawesome/all.min.js')}}"></script>
    <!-- <script src="{{ asset('public/assets/js/theme.js')}}"></script> -->

    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  </body>

</html>