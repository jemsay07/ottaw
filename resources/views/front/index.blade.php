<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="30000">
    {{-- <meta http-equiv="refresh" content="6480000"> --}}
    <title>Ottawa4d</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-main">
    <main class="ottawada-main">
        <header class="main-header">
            <div class="container d-flex">
                <div class="col col-sm-12 col-md-12 col-lg-4">
                   <img src="/images/bg/imgpsh_fullsize_anim.png" alt="">
                </div>
                <div class="col col-sm-12 col-md-12 col-lg-8">
                    <div class="top">LIVEDRAW TIME 19.00 PM | LIVEDRAW TIME RESULT 19.30 PM GMT+7</div>
                    <div class="inner-text pb-5 pt-3">
                        <h3>Play to win</h3>
                        <span class="desc">if won the lottery, the first thing I would do is...</span>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                              <a class="nav-link {{ ( Route::currentRouteName() == 'home' ) ? 'active' : '' }}" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link {{ ( Route::currentRouteName() == 'about') ? 'active' : '' }}" href="/about">About us</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link {{ ( Route::currentRouteName() == 'contact-us') ? 'active' : '' }}" href="/contact-us">Contact us</a>
                            </li>
                          </ul>
                        </div>
                      </nav>
                </div>
            </div>
        </header>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @yield('front-content')
        <div id="testLOad"></div>
        <footer class="footer-wrap">
          <div class="footer-socket full-container">
            <div class="icons-group">
              <span class="icons-item"></span>
              <span class="icons-item"></span>
              <span class="icons-item"></span>
              <span class="icons-item"></span>
              <span class="icons-item"></span>
            </div>
          </div>
        </footer>
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>