<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
<title>Mathanan Restaurant</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/favicon.ico') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@livewireScripts
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                        <ul>
                                                              
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>Mathanan menyajikan menu yang berkualitas <a href="{{ route('menu') }}">Lihat Menu</a></li>
                                    <li>Dijamin Lezat dan Bergizi</li>
                                    <li>Punya Pertanyaan? <a href="{{ route('contact') }}">Silahkan Bertanya</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            @auth
                            <ul>                                
                                <li><i class="fi-rs-user"></i> {{ Auth::user()->name }} / 
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">log out</a>
                                    </form>
                                </li>
                            </ul>
                            @else
                            <ul>                                
                                <li><i class="fi-rs-key"></i><a href="{{ route('login') }}">Log In </a>  / <a href="{{ route('register') }}">Sign Up</a></li>
                            </ul>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a><img width="50" src="{{  asset('assets/imgs/logo/mathanan.jpeg') }}" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-1">
                            {{-- <form action="#">                                
                                <input type="text" placeholder="Search for items...">
                            </form> --}}
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                               

                                @livewire('cart-icon-component')


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img class="logo-img" src="{{  asset('assets/imgs/logo/mathanan.jpeg') }}" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="/">Home </a></li>
                                    {{-- <li><a href="about.html">About</a></li> --}}
                                    {{-- {{ route('shop') }} --}}
                                    <li><a href="{{ route('menu') }}">Menu</a></li>
                                   
                                    <li><a href="{{ route('contact') }}">Contact</a></li>                                    
                                    <li><a href="{{ route('menu.cart') }}">Cart</a></li>
                                    @auth
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                        
                                        @if (Auth::user()->utype == 'ADM')
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                            <li><a href="{{ route('admin.menus') }}">Menus</a></li>
                                            {{-- {{ route('admin.categories') }} --}}
                                            {{-- <li><a href=" {{ route('admin.categories') }}">Categories</a></li> --}}
                                            <li><a href="{{ route('admin.message') }}">Message & feedback</a></li>
                                            <li><a href="{{ route('profile.edit') }}">Admin Profile</a></li>
                                            <li><a href="{{ route('admin.addadmin') }}">Add Admin</a></li>
                                                                                  
                                        </ul>

                                        @else
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                            <li><a href="{{ route('profile.edit') }}">User Profile</a></li>
                                                                             
                                        </ul>
                                        @endif
                                        
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        @foreach ($admins as $admin)
                        <p><i class="fi-rs-smartphone"></i>(+62) {{ $admin->phonenumber }} </p>
                        @endforeach
                    </div>
                    <p class="mobile-promotion">Mathanan <span class="text-brand">menyediakan</span>. makanan yang berkualitas</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                           
                            <div class="header-action-icon-2">
                                @livewire('cart-icon-component')
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{  asset('assets/imgs/logo/mathanan.jpeg') }}" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    {{-- <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form> --}}
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                          
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="/">Home</a></li>
                            {{-- <li class="menu-item-has-children"><span class="menu-expand"></span><a href="about.html">About</a></li> --}}
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('menu') }}">Menu</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('contact') }}">Contact</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ route('menu.cart') }}">Cart</a></li> 

                            @auth
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">My Account</a>
                                @if (Auth::user()->utype == 'ADM')
                                <ul class="sub-menu">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('admin.menus') }}">Menus</a></li>
                                    {{-- {{ route('admin.categories') }} --}}
                                    {{-- <li><a href=" {{ route('admin.categories') }}">Categories</a></li> --}}
                                    <li><a href="{{ route('admin.message') }}">Message & feedback</a></li>
                                    <li><a href="{{ route('profile.edit') }}">Admin Profile</a></li>
                                    <li><a href="{{ route('admin.addadmin') }}">Add Admin</a></li>
                                                                          
                                </ul>

                                @else
                                <ul class="sub-menu">
                                    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('profile.edit') }}">User Profile</a></li>
                                                                     
                                </ul>
                                @endif
                            </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
               
                <div class="mobile-header-info-wrap mobile-header-border">
                    {{-- <div class="single-mobile-header-info mt-30">
                        <a href="contact.html"> Our location </a>
                    </div> --}}
                    @auth
                    <div class="single-mobile-header-info">
                        <a href="">{{ Auth::user()->name }}</a>                        
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="single-mobile-header-info">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">log out</a>                  
                        </div>
                    </form>
                       
                    @else
                    <div class="single-mobile-header-info">
                        <a href="{{ route('login') }}">Log In </a>                        
                    </div>
                    <div class="single-mobile-header-info">                        
                        <a href="{{ route('register') }}">Sign Up</a>
                    </div>
                    @endauth
                    <div class="single-mobile-header-info">
                        <a href="#">(+62) {{ $admin->phonenumber }} </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="https://www.instagram.com/mathananstreet/"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>        
    {{-- home-component --}}
    {{ $slot }}
    {{-- @yield('content') @if( isset($slot) ) {{ $slot }} @endif --}}

    <footer class="main">
       
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="index.html"><img src="{{  asset('assets/imgs/logo/mathanan.jpeg') }}" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>

                            @foreach ($admins as $admin)
                        
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>{{ $admin->address }}
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>{{ $admin->phonenumber }}
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>{{ $admin->email }}
                            </p>

                            @endforeach

                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                                <a href="https://www.instagram.com/mathananstreet/"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>                            
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        @auth
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        @if (Auth::user()->utype == 'ADM')
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('admin.menus') }}">Menus</a></li>
                            {{-- {{ route('admin.categories') }} --}}
                            {{-- <li><a href=" {{ route('admin.categories') }}">Categories</a></li> --}}
                            <li><a href="{{ route('admin.message') }}">Message & feedback</a></li>
                            <li><a href="{{ route('profile.edit') }}">Admin Profile</a></li>
                            <li><a href="{{ route('admin.addadmin') }}">Add Admin</a></li>
                                                                  
                        </ul>

                        @else
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('profile.edit') }}">User Profile</a></li>
                                                             
                        </ul>
                        @endif
                        @endif
                    </div>
                    <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Payment</h5>
                        <div class="row">
                            {{-- <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">From App Store or Google Play</p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="assets/imgs/theme/app-store.jpg" alt=""></a>
                                    <a href="#" class="hover-up"><img src="assets/imgs/theme/google-play.jpg" alt=""></a>
                                </div>
                            </div> --}}
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                                <img class="wow fadeIn animated" width="300" src={{  asset('assets/imgs/theme/midtrans.jpg') }} alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        {{-- <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms & Conditions</a> --}}
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">Mathanan</strong> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>    
    <!-- V') }}endor JS-->
<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/js/main.js?v=3.3') }}"></script>
<script src="{{ asset('assets/js/shop.js?v=3.3') }}"></script>
@livewireScripts

</body>

</html>