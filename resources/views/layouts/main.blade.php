<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/front_assets/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Title -->
    <title>Job Portal</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="/front_assets/css/linearicons.css">
    <link rel="stylesheet" href="/front_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/front_assets/css/bootstrap.css">
    <link rel="stylesheet" href="/front_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/front_assets/css/nice-select.css">
    <link rel="stylesheet" href="/front_assets/css/animate.min.css">
    <link rel="stylesheet" href="/front_assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/front_assets/css/main.css">
</head>
<body>

<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="{{ route('main') }}"><img src="{{ asset('logo_mini_new.png') }}" alt="" title="" /> <b><span class="header-text" style="color: white; font-size: large; margin-left: 5px;">Job portal</span></b></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="{{ route('main') }}">Home</a></li>
                    <li><a href="{{ route('jobs.index') }}">Find jobs</a></li>
{{--                    <li><a href="about-us.html">About Us</a></li>--}}
{{--                    <li><a href="category.html">Category</a></li>--}}
{{--                    <li><a href="price.html">Price</a></li>--}}
{{--                    <li><a href="blog-home.html">Blog</a></li>--}}
{{--                    <li><a href="contact.html">Contact</a></li>--}}
{{--                    <li class="menu-has-children"><a href="">Pages</a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="elements.html">elements</a></li>--}}
{{--                            <li><a href="search.html">search</a></li>--}}
{{--                            <li><a href="single.html">single</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    @if(Auth::guard('user')->check())
                        <li class="menu-has-children"><a href="#">Job Seeker: {{ Auth::guard('user')->user()->name }} <span class="caret"></span></a>
                            <ul>
                                <li><a href="{{route('home')}}" >Dashboard</a></li>
                                <li>
                                    <a href="{{ route('user.view_profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>

{{--                        <li class="nav-item dropdown">--}}
{{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                Job Seeker: {{ Auth::guard('user')->user()->name }} <span class="caret"></span>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                <a href="{{route('home')}}" class="dropdown-item">Dashboard</a>--}}
{{--                                <a class="dropdown-item" href="{{ route('user.view_profile') }}">--}}
{{--                                    {{ __('Profile') }}--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                                 document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                    @elseif(Auth::guard('web')->guest())
                        <li class="nav-item">
                            <a class="nav-link ticker-btn" href="{{ route('user.login.show') }}">Job Seeker</a>
                        </li>
                    @endif
                    @if(Auth::guard('employeer')->check())
                        <li class="nav-item">
                            <a class="nav-link ticker-btn" style="color: green;" href="{{ route('jobs.create') }}">Post Job</a>
                        </li>

                        <li class="menu-has-children"><a href="#">Employeer: {{ Auth::guard('employeer')->user()->name }} <span class="caret"></span></a>
                            <ul>
                                <li><a href="{{route('employ.dash')}}" >Dashboard</a></li>
                                <li>
                                    <a href="{{ route('employ.view_profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link ticker-btn" href="{{ route('employer.login.show') }}">Employeer</a>
                        </li>
                    @endif
{{--                    <li><a class="ticker-btn" href="#">Signup</a></li>--}}
{{--                    <li><a class="ticker-btn" href="#">Login</a></li>--}}
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->

    @yield('content')

<!-- start footer Area -->
<footer class="footer-area section-gap" style="margin-top: 8%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-12">
                <div class="single-footer-widget">
                    <h6>Contents</h6>
                    <ul class="footer-nav">
                        <li><a href="{{ route('jobs.index') }}">Jobs</a></li>
                        <li><a href="#">Posts</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">About us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6  col-md-12">
                <div class="single-footer-widget newsletter">
                    <h6>Newsletter</h6>
                    <p>You can trust us. we only send promo offers, not a single spam.</p>
                    <div id="mc_embed_signup">
                        <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

                            <div class="form-group row" style="width: 100%">
                                <div class="col-lg-8 col-md-12">
                                    <input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12">
                                    <button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
                                </div>
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-12">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instragram Feed</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        @for($i=1; $i<=8; $i++)
                            <li><img src="/front_assets/img/i{{$i}}.jpg" alt=""></li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>

        <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            <div class="col-lg-4 col-sm-12 footer-social">
                <a href="https://www.facebook.com/shayxnazar.madaminov.1" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/shayxnazar_/" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://t.me/Shaykhnazar" target="_blank"><i class="fa fa-telegram"></i></a>
                <a href="https://vk.com/shayxnazar" target="_blank"><i class="fa fa-vk"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- End footer Area -->

@yield('js')

<script src="/front_assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="/front_assets/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="/front_assets/js/easing.min.js"></script>
<script src="/front_assets/js/hoverIntent.js"></script>
<script src="/front_assets/js/superfish.min.js"></script>
<script src="/front_assets/js/jquery.ajaxchimp.min.js"></script>
<script src="/front_assets/js/jquery.magnific-popup.min.js"></script>
<script src="/front_assets/js/owl.carousel.min.js"></script>
<script src="/front_assets/js/jquery.sticky.js"></script>
<script src="/front_assets/js/jquery.nice-select.min.js"></script>
<script src="/front_assets/js/parallax.min.js"></script>
<script src="/front_assets/js/mail-script.js"></script>
<script src="/front_assets/js/main.js"></script>
</body>
</html>
