<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
@php
  $content = App\ContentSetup::first();
  $category = App\KategoriGallery::all();
@endphp
<head>
  <!-- =====  BASIC PAGE NEEDS  ===== -->
  <meta charset="utf-8">
  <title>Dark look E-commerce Bootstrap Template</title>
  <!-- =====  SEO MATE  ===== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="distribution" content="global">
  <meta name="revisit-after" content="2 Days">
  <meta name="robots" content="ALL">
  <meta name="rating" content="8 YEARS">
  <meta name="Language" content="en-us">
  <meta name="GOOGLEBOT" content="NOARCHIVE">
  <!-- =====  MOBILE SPECIFICATION  ===== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width">
  <!-- =====  CSS  ===== -->
  <link rel="stylesheet" type="text/css" href="{{asset('darklook/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('darklook/css/bootstrap.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('darklook/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('darklook/css/magnific-popup.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('darklook/css/owl.carousel.css')}}">
  <link rel="shortcut icon" href="{{asset('darklook/images/favicon.png')}}">
  <link rel="apple-touch-icon" href="{{asset('darklook/images/apple-touch-icon.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('darklook/images/apple-touch-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('darklook/images/apple-touch-icon-114x114.png')}}">
</head>

<body>
  <!-- =====  LODER  ===== -->
  <div class="loder"></div>
  <div class="wrapper">
    <div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
      <div class="newsletter-popup"> <img class="offer" src="{{asset('darklook/images/newsbg.jpg')}}" alt="offer">
        <div class="newsletter-popup-static newsletter-popup-top">
          <div class="popup-text">
            <div class="popup-title">50% <span>off</span></div>
            <div class="popup-desc">
              <div>Sign up and get 50% off your next Order</div>
            </div>
          </div>
          <form onsubmit="return  validatpopupemail();" method="post">
            <div class="form-group required">
              <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email" class="form-control input-lg" required />
              <button type="submit" class="btn btn-default btn-lg" id="email-popup-submit">Subscribe</button>
              <label class="checkme">
                <input type="checkbox" value="" id="checkme" /> Dont show again</label>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- =====  HEADER START  ===== -->
    <header id="header">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="header-top-left">
                <div class="contact"><span class="hidden-xs hidden-sm hidden-md">Days a week from 9:00 am to 7:00 pm</span></div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-8">
              <ul class="header-top-right text-right">
                <li class="account"><a>Admin</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="main-search mt_40">
                <input id="search-input" name="search" value="" placeholder="Search" class="form-control input-lg" autocomplete="off" type="text">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
              </span> </div>
            </div>
            <div class="navbar-header col-xs-6 col-sm-4"> <a class="navbar-brand" href="index.html"> <img alt="themini" src="{{asset('img/logo.png')}}"> </a> </div>
            <div class="col-xs-6 col-sm-4 shopcart">
              {{-- <div id="cart" class="btn-group btn-block mtb_40">
                <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true"><span id="shippingcart">Shopping cart</span><span id="cart-total">items (0)</span> </button>
              </div>
              <div id="cart-dropdown" class="cart-menu collapse">
                <ul>
                  <li>
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td class="text-center"><a href="#"><img src="images/product/70x84.jpg" alt="iPod Classic" title="iPod Classic"></a></td>
                          <td class="text-left product-name"><a href="#">MacBook Pro</a> <span class="text-left price">$20.00</span>
                            <input class="cart-qty" name="product_quantity" min="1" value="1" type="number">
                          </td>
                          <td class="text-center"><a class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                        </tr>
                        <tr>
                          <td class="text-center"><a href="#"><img src="images/product/70x84.jpg" alt="iPod Classic" title="iPod Classic"></a></td>
                          <td class="text-left product-name"><a href="#">MacBook Pro</a> <span class="text-left price">$20.00</span>
                            <input class="cart-qty" name="product_quantity" min="1" value="1" type="number">
                          </td>
                          <td class="text-center"><a class="close-cart"><i class="fa fa-times-circle"></i></a></td>
                        </tr>
                      </tbody>
                    </table>
                  </li>
                  <li>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Sub-Total</strong></td>
                          <td class="text-right">$2,100.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                          <td class="text-right">$2.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>VAT (20%)</strong></td>
                          <td class="text-right">$20.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right">$2,122.00</td>
                        </tr>
                      </tbody>
                    </table>
                  </li>
                  <li>
                    <form action="cart_page.html">
                      <input class="btn pull-left mt_10" value="View cart" type="submit">
                    </form>
                    <form action="checkout_page.html">
                      <input class="btn pull-right mt_10" value="Checkout" type="submit">
                    </form>
                  </li>
                </ul>
              </div> --}}
            </div>
          </div>
          <nav class="navbar">
            <p>menu</p>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
            <div class="collapse navbar-collapse js-navbar-collapse">
              <ul id="menu" class="nav navbar-nav">
                <li> <a href="{{ url('/') }}">Home</a></li>
                {{-- <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Collection </a>
                  <ul class="dropdown-menu mega-dropdown-menu row">
                    <li class="col-md-3">
                      <ul>
                        <li class="dropdown-header">Women's</li>
                        <li><a href="#">Unique Features</a></li>
                        <li><a href="#">Image Responsive</a></li>
                        <li><a href="#">Auto Carousel</a></li>
                        <li><a href="#">Newsletter Form</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Good Typography</a></li>
                      </ul>
                    </li>
                    <li class="col-md-3">
                      <ul>
                        <li class="dropdown-header">Man's</li>
                        <li><a href="#">Unique Features</a></li>
                        <li><a href="#">Image Responsive</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Auto Carousel</a></li>
                        <li><a href="#">Newsletter Form</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Good Typography</a></li>
                      </ul>
                    </li>
                    <li class="col-md-3">
                      <ul>
                        <li class="dropdown-header">Children's</li>
                        <li><a href="#">Unique Features</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Image Responsive</a></li>
                        <li><a href="#">Auto Carousel</a></li>
                        <li><a href="#">Newsletter Form</a></li>
                        <li><a href="#">Four columns</a></li>
                        <li><a href="#">Good Typography</a></li>
                      </ul>
                    </li>
                    <li class="col-md-3">
                      <ul>
                        <li id="myCarousel" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="item active"> <a href="#"><img src="images/menu-banner1.jpg" class="img-responsive" alt="Banner1"></a></div>
                            <!-- End Item -->
                            <div class="item"> <a href="#"><img src="images/menu-banner2.jpg" class="img-responsive" alt="Banner1"></a></div>
                            <!-- End Item -->
                            <div class="item"> <a href="#"><img src="images/menu-banner3.jpg" class="img-responsive" alt="Banner1"></a></div>
                            <!-- End Item -->
                          </div>
                          <!-- End Carousel Inner -->
                        </li>
                        <!-- /.carousel -->
                      </ul>
                    </li>
                  </ul>
                </li> --}}
                {{-- <li> <a href="category_page.html">Shop</a></li> --}}
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products </a>
                  <ul class="dropdown-menu">
                    @foreach ($category as $item)
                      <li> <a href="#">{{ $item->name }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li> <a href="{{ url('blog') }}">Blog</a></li>
                <li> <a href="#">About us</a></li>
                <li> <a href="#">Contact us</a></li>
              </ul>
            </div>
            <!-- /.nav-collapse -->
          </nav>
        </div>
      </div>
    </header>
    <!-- =====  HEADER END  ===== -->
    <!-- =====  BANNER STRAT  ===== -->
    @if(isset($slide_status) && !empty($slide))
      <div class="banner">
        <div class="main-banner owl-carousel">
          @foreach($slide as $item)
            <div class="item"><a href="#"><img src="{{asset('img/slide/'.$item->img)}}" alt="Main Banner" class="img-responsive" /></a></div>  
          @endforeach
        </div>
      </div>
    @endif
    <!-- =====  BANNER END  ===== -->
    <!-- =====  CONTAINER START  ===== -->
    @yield('content')
    <!-- =====  CONTAINER END  ===== -->
    <!-- =====  FOOTER START  ===== -->
    <div class="footer pt_60">
      <div class="container">
        <div class="newsletters mt_30 mb_50">
          <div class="row">
            <div class="col-sm-6">
              <div class="news-head pull-left">
                <h2>Follow Our Updates !</h2>
                <div class="new-desc">Be the First to know about our Fresh Arrivals and much more!</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="news-form pull-right">
                <form onsubmit="return validatemail();" method="post">
                  <div class="form-group required">
                    <input name="email" id="email" placeholder="Enter Your Email" class="form-control input-lg" required="" type="email">
                    <button type="submit" class="btn btn-default btn-lg">Subscribe</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Information</h6>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Delivery Information</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="contact.html">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-block">
          </div>
          <div class="col-md-3 footer-block">
          </div>
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Contacts</h6>
            <ul>
              <li>Warehouse & Offices,</li>
              <li>{{ $content->alamat }}</li>
              <li>{{ $content->no_tlp }}</li>
              <li>{{ $content->email }}</li>
              <li><a href="{{ $content->nama_web }}">{{ $content->nama_web }}</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom mt_60 ptb_20">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="social_icon">
                <ul>
                  <li><a href="{{$content->facebook}}"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="{{$content->twitter}}"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="{{$content->email}}"><i class="fa fa-google"></i></a></li>
                  <li><a href="{{$content->instagram}}"><i class="fa fa-instagram"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="copyright-part text-center">@ {{Carbon\Carbon::now()->format('Y')}} All Rights Reserved Darklook</div>
            </div>
            <div class="col-sm-4">
              <div class="payment-icon text-right">
                {{-- <ul>
                  <li><i class="fa fa-cc-paypal "></i></li>
                  <li><i class="fa fa-cc-visa"></i></li>
                  <li><i class="fa fa-cc-discover"></i></li>
                  <li><i class="fa fa-cc-mastercard"></i></li>
                  <li><i class="fa fa-cc-amex"></i></li>
                </ul> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- =====  FOOTER END  ===== -->
  </div>
  <a id="scrollup"></a>
  <script src="{{asset('darklook/js/jQuery_v3.1.1.min.js')}}"></script>
  <script src="{{asset('darklook/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('darklook/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('darklook/js/jquery.magnific-popup.js')}}"></script>
  <script src="{{asset('darklook/js/jquery.firstVisitPopup.js')}}"></script>
  <script src="{{asset('darklook/js/custom.js')}}"></script>
</body>

</html>