<!DOCTYPE html><!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.3
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8" />
	<title>
		ADMIN | @yield('title')
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf_token" content="{{ csrf_token() }}">
	<!--begin::Web font -->
	<script src="{{ asset('/js/webfont.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<style type="text/css">
		::-webkit-scrollbar {
		width: 4px;
		background: rgba(255,255,255,0.2);}
		::-webkit-scrollbar-thumb {background: #33a6f3;}
	</style>
	<!--end::Web font -->
	<!--begin::Base Styles -->
	<!--begin::Page Vendors -->
	{{-- <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" /> --}}
	<link href="{{ asset('/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors -->
	<link href="{{ asset('/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="{{ asset('/assets/demo/default/media/img/logo/favicon.ico') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datepicker.standalone.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <style type="text/css">
        body{
            font-family: 'Comfortaa', cursive;
        }
    </style>
	<!--begin::plugin styles -->
	@stack('plugin-styles')
	<style type="text/css">
	.select2 {
		width:100%!important;
	}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('/js/sweetalert2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.css') }}">
<!--end::plugin styles -->
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-dark2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- BEGIN: Header -->
<header class="m-grid__item m-header " data-minimize-offset="200" data-minimize-mobile-offset="200">
	<div class="m-container m-container--fluid m-container--full-height">
		<div class="m-stack m-stack--ver m-stack--desktop">
			<!-- BEGIN: Brand -->
			<div class="m-stack__item m-brand m-brand--skin-dark">
				<div class="m-stack m-stack--ver m-stack--general">
					<div class="m-stack__item m-stack__item--middle m-brand__logo">
						@php
							$logo = App\ContentSetup::first()->logo;	
						@endphp
						<a class="m-brand__logo-wrapper"><img src="{{asset('img/'.$logo)}}" height="30px"></a>
					</div>
					<div class="m-stack__item m-stack__item--middle m-brand__tools">
						<!-- BEGIN: Left Aside Minimize Toggle -->
						<a href="javascript:;" id="m_aside_left_minimize_toggle" class=""><span></span></a>
						<!-- END -->
						<!-- BEGIN: Responsive Aside Left Menu Toggler -->
						<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block"><span></span></a>
						<!-- END -->
						<!-- BEGIN: Topbar Toggler -->
						<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block"><i class="flaticon-more"></i></a>
						<!-- BEGIN: Topbar Toggler --></div>
				</div>
			</div>
			<!-- END: Brand -->
			<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
				<!-- BEGIN: Horizontal Menu -->
				<button class="m-aside-header-menu-mobile-close m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
				<i class="la la-close"></i>
				</button>
				<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas m-header-menu--skin-dark m-header-menu--submenu-skin-dark m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "></div>
				<!-- END: Horizontal Menu -->
				<!-- BEGIN: Topbar -->
				<div id="m_header_topbar" class="m-topbar m-stack m-stack--ver m-stack--general">
					<div class="m-stack__item m-topbar__nav-wrapper">
						<ul class="m-topbar__nav m-nav m-nav--inline">
							<li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-dark m-list-search m-list-search--skin-dark" data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch" data-search-type="dropdown" aria-expanded="true">
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
									<div class="m-dropdown__inner ">
										<div class="m-dropdown__header">
											<form class="m-list-search__form">
												<div class="m-list-search__form-wrapper">
													<span class="m-list-search__form-input-wrapper">
													<input id="m_quicksearch_input" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Search..."></span>
													<span class="m-list-search__form-icon-close" id="m_quicksearch_close">
													<i class="la la-remove"></i>
													</span>
												</div>
											</form>
										</div>
										<div class="m-dropdown__body">
											<div class="m-dropdown__scrollable m-scrollable mCustomScrollbar _mCS_2 mCS-autoHide mCS_no_scrollbar" data-scrollable="true" data-max-height="300" data-mobile-max-height="200" style="max-height: 300px; height: 300px; position: relative; overflow: visible;">
												<div id="mCSB_2" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: 300px;">
													<div id="mCSB_2_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
														<div class="m-dropdown__content"></div>
													</div>
												</div>
												<div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: none;">
													<div class="mCSB_draggerContainer">
														<div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; top: 0px;">
															<div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
														</div>
														<div class="mCSB_draggerRail"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
								<a href="#" class="m-nav__link m-dropdown__toggle">
								<span class="m-topbar__userpic">
								<img src="{{asset('img/foto/'.Auth::user()->foto)}}" class="m--img-rounded m--marginless m--img-centered" alt="">
								</span>
								<span class="m-topbar__username m--hide"></span>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center" style="background: url({{asset('assets/app/media/img/misc/user_profile_bg.jpg')}}); background-size: cover;">
											<div class="m-card-user m-card-user--skin-dark">
												<div class="m-card-user__pic">
													<img src="{{asset('img/foto/'.Auth::user()->foto)}}" class="m--img-rounded m--marginless" alt="">
												</div>
												<div class="m-card-user__details">
													<span class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
													<a href="{{ Auth::user()->email }}" class="m-card-user__email m--font-weight-300 m-link">{{ Auth::user()->email }}</a>
												</div>
											</div>
										</div>
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav m-nav--skin-light">
													<li class="m-nav__section m--hide">
														<span class="m-nav__section-text">Section</span>
													</li>
													<li class="m-nav__item">
														<a href="{{url('admin/profile')}}" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-profile-1"></i>
														<span class="m-nav__link-title">
														<span class="m-nav__link-wrap">
														<span class="m-nav__link-text">Biodata</span>
														</span>
														</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit"></li>
													<li>
														<a class="btn m-btn--pill btn-sm btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" href="{{url('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
														<form id="logout-form" action="{{url('logout')}}" method="POST" style="display: none;">
															{{ csrf_field() }}
														</form>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- END: Topbar --></div>
		</div>
	</div>
</header>
<!-- END: Header -->
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<!-- BEGIN: Left Aside -->
	<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
		<i class="la la-close"></i>
	</button>
	<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
		<!-- BEGIN: Aside Menu -->
		<div 
		id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500">

		@yield('nav')
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
			<li class="m-menu__item  {{ Request::is('home') ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
				<a  href="{{ url('/home') }}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Dashboard
							</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__section">
				<h4 class="m-menu__section-text">
					Menu
				</h4>
				<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>
			@php
				$section_master = Request::is('admin/master/kategori_post') || 
								  Request::is('admin/master/kategori_gallery') ? 'item--open m-menu__item--expandedm-menu__item  m-menu__item--submenu m-menu__item--open m-menu__item--expanded' : '';
			@endphp
			<li class="m-menu__item  m-menu__item--submenu {{ $section_master }}{{--  --}}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-list-2"></i>
					<span class="m-menu__link-text">
						Master
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item {{ Request::is('admin/master/kategori_post') ? 'm-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="{{url('admin/master/kategori_post')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Kategori (Blog)
								</span>
							</a>
						</li>
						<li class="m-menu__item {{ Request::is('admin/master/kategori_gallery') ? 'm-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="{{url('admin/master/kategori_gallery')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Kategori (Gallery)
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="m-menu__item  {{ Request::is('admin/content_setup') ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
				<a  href="{{ url('admin/content_setup') }}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Content
							</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  {{ Request::is('admin/blog_manager') ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
				<a  href="{{ url('admin/blog_manager') }}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Blog
							</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  {{ Request::is('admin/gallery_manager') ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
				<a  href="{{ url('admin/gallery_manager') }}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Gallery
							</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  {{ Request::is('admin/brand') ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
				<a  href="{{ url('admin/brand') }}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Brand
							</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  {{ Request::is('admin/slide') ? 'm-menu__item--active' : ''}}" aria-haspopup="true">
				<a  href="{{ url('admin/slide') }}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Slide
							</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--submenu {{ Request::is('admin/perolehan/fitrah') || Request::is('admin/perolehan/mal') || Request::is('admin/perolehan/amal') ? 'item--open m-menu__item--expandedm-menu__item  m-menu__item--submenu m-menu__item--open m-menu__item--expanded' : ''}}" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-analytics"></i>
					<span class="m-menu__link-text">
						Perolehan
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item {{ Request::is('admin/perolehan/fitrah') ? 'm-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="{{url('/admin/perolehan/fitrah')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Zakat Fitrah
								</span>
							</a>
						</li>
						<li class="m-menu__item {{ Request::is('admin/perolehan/mal') ? 'm-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="{{ url('/admin/perolehan/mal') }}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Zakat Mal
								</span>
							</a>
						</li>
						<li class="m-menu__item {{ Request::is('admin/perolehan/amal') ? 'm-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="{{ url('/admin/perolehan/amal') }}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Infaq dan Sodaqoh
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			@role('su')
			<li class="m-menu__item {{ Request::is('su/user') ? 'm-menu__item--active' : ''}}" aria-haspopup="true" >
				<a  href="{{ url('/su/user') }}" class="m-menu__link ">
					<span class="m-menu__link-text">
						<i class="flaticon-users"></i>&emsp;Admin
					</span>
				</a>
			</li>
			@endrole
		</ul>
	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					@yield('title')
				</h3>
				@yield('bread')
			</div>
			<div>
				<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
					<span class="m-subheader__daterange-label">
						<span class="m-subheader__daterange-title"></span>
						<span class="m-subheader__daterange-date m--font-brand"></span>
					</span>
					<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
						<i class="la la-angle-down"></i>
					</a>
				</span>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">{{--  --}}
		@yield('content')
	</div>
</div>
</div>
<!-- end:: Body -->
<!-- begin::Footer -->
<footer class="m-grid__item		m-footer ">
	<div class="m-container m-container--fluid m-container--full-height m-page__container">
		<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
			<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
				<span class="m-footer__copyright">
					{{ Carbon\Carbon::now()->format('Y') }} &copy; Web App Idiosyncrasi by
					<a href="#" class="m-link">
						Ari Ardiansyah
					</a>
				</span>
			</div>
			{{-- Right --}}
		</div>
	</div>
</footer>
<!-- end::Footer -->
</div>
<!-- end:: Page -->
<!-- begin::Quick Sidebar -->

<!-- end::Quick Sidebar -->
<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
<!-- begin::Quick Nav -->

<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="{{ asset('/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Vendors -->
<script src="{{ asset('/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Snippets -->
<script src="{{ asset('/assets/app/js/dashboard.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/demo/default/custom/components/base/toastr.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('/js/sweetalert2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/jquery.number.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.PrintArea.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
<!--end::Page Snippets -->
<!--begin::plugin scripts-->
<script type="text/javascript">
	$(document).ready(function() {
		$('.select2').select2();
	});
	@if(session()->has('notif'))
	toastr.options = {
		"closeButton": true,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	};

	toastr.{{ session()->get('notif.level') }}("{{ session()->get('notif.message') }}","{{ session()->get('notif.title') }}");
	@endif
</script>
@stack('plugin-scripts')
<!--end::plugin scripts-->
</body>
<!-- end::Body -->
</html>
