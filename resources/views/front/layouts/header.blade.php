<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Bootstrap News Template - Free HTML Templates</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta
      content="Bootstrap News Template - Free HTML Templates"
      name="keywords"
    />
    <meta
      content="Bootstrap News Template - Free HTML Templates"
      name="description"
    />

    <!-- Favicon -->
    <link href="{{ asset('assets/front') }}/img/favicon.ico" rel="icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap"
      rel="stylesheet"
    />

    <!-- CSS Libraries -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link href="{{ asset('assets/front') }}/lib/slick/slick.css" rel="stylesheet" />
    <link href="{{ asset('assets/front') }}/lib/slick/slick-theme.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/front') }}/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Top Bar Start -->
    <div class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="tb-contact">
              <p><i class="fas fa-envelope"></i>{{ $setting->email }}</p>
              <p><i class="fas fa-phone-alt"></i>{{ $setting->phone }}</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tb-menu">
                @guest
                <a href="{{ route('register') }}">Register</a>
                <a href="{{ route('login') }}">Login</a>
                @endguest

                @auth
                <a href="javascript::void(0)" onclick="if(confirm('do you want to logout?')){
                document.getElementById('logoutform').submit()} return false">Logout</a>
                @endauth

                <form id="logoutform" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
              {{-- <a href="{{ route('contact.create') }}">Contact</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Top Bar Start -->

    <!-- Brand Start -->
    <div class="brand">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3 col-md-4">
            <div class="b-logo">
              <a href="index.html">
                <img src="{{ asset('assets/front') }}/img/logo.png" alt="Logo" />
              </a>
            </div>
          </div>
          <div class="col-lg-6 col-md-4">
            <div class="b-ads">
              <a href="https://htmlcodex.com">
                <img src="{{ asset('assets/front') }}/img/ads-1.jpg" alt="Ads" />
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <form action="{{ route('search') }}" method="post">
                @csrf

            <div class="b-search">
              <input type="text" name="search" placeholder="Search" />
              <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Brand End -->

    <!-- Nav Bar Start -->
    <div class="nav-bar">
      <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
          <a href="#" class="navbar-brand">MENU</a>
          <button
            type="button"
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbarCollapse"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div
            class="collapse navbar-collapse justify-content-between"
            id="navbarCollapse"
          >
            <div class="navbar-nav mr-auto">
              <a href="index.html" class="nav-item nav-link active">Home</a>
              <div class="nav-item dropdown">
                <a
                  href="#"
                  class="nav-link dropdown-toggle"
                  data-toggle="dropdown"
                  >catogries</a
                >
                <div class="dropdown-menu">

                    @foreach ($catogries as $catogry)
                    <a href="{{ route('catogries.posts',$catogry->slug) }}" class="dropdown-item">{{ $catogry->name }}</a>
                    @endforeach
                </div>
              </div>
              <a href="single-page.html" class="nav-item nav-link"
                >Single Page</a
              >
              <a href="dashboard.html" class="nav-item nav-link">Dashboard</a>
              <a href="{{ route('contact.create') }}" class="nav-item nav-link">Contact Us</a>
            </div>
            <div class="social ml-auto">
              <a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a>
              <a href="{{ $setting->fecabook }}"><i class="fab fa-facebook-f"></i></a>
              <a href=""><i class="fab fa-linkedin-in"></i></a>
              <a href="{{ $setting->instgram }}"><i class="fab fa-instagram"></i></a>
              <a href="{{ $setting->yotube }}"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Nav Bar End -->
