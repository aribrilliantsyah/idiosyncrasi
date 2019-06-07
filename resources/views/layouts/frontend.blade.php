<!DOCTYPE html>
<html>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<head>
		<!-- Return to Top -->
		<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">	
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/anime.css') }}" id='page-skin-1'>
        {{-- plugin styles --}}
		@stack('plugin-styles')
		<style>
	      #map {
	        width: 100%;
	        height: 400px;
	        background-color: grey;
	      }
	    </style>
	</head>
	<body class='home blog'>

		{{-- sosmed --}}
		<div class='jorib' style="padding-top: 10px;">
			@foreach(App\sosmed::all() as $key => $value)
			@php
			$index= $key+1;
			@endphp
			@if($index %2 == 0)
			<a href='#' target='_blank'>
				<div class='twitterjo' style="padding-left: 3px;"><i class="fa custom fa-facebook" style="background: #fff;color: #000;"></i></div>
			</a>
			@else
			<a href='#' target='_blank'>
				<div class='googlejo' style="padding-left: 3px;"><i class="fa custom fa-twitter" style="background: #fff;color: #000;"></i></div>
			</a>
			@endif
			@endforeach
		</div>

		{{-- header --}}
		<div id='header'>
			<div class='header-wrap'>
				<div class='blognames section' id='blognames'>
					<div class='widget Header' data-version='1' id='Header1'>
						<h1 id='blog-title'><span>
							<a href='{{ url('/') }}' rel='home' title=''>Islamic</a>
						</span></h1>
						<h2 id='blog-desc'><span>For All and For The Future</span></h2>
					</div>
				</div>
			</div>
		</div>
		{{-- menu --}}
		<div id='menujohanes'>
			<ul>
				<li class='selected'>
					<a href='{{ url('/') }}' title='Beranda'>Beranda</a>
				</li>
				<li>
					<a class='menu' href='#'>Tentang</a>
				</li>
			</ul>
		</div>
		{{-- page --}}
		<div id='wrapper'>
			@include('layouts.slide')
			<div class='clear'></div>
				<div id='casing'>

					{{-- content --}}
					<div id='content'>
						@yield('content')
					</div>

					{{-- sidebar --}}
					<div class='sidebar'>
						<form action='{{ url('/search') }}' id='search' name="search" method="get">
							{{ csrf_field() }}
							<input name="jenis" value="search" type="hidden" />
							<input name='search' placeholder='Casi Sesuatu..' size='40' type='text'/>
						</form>
						<div class='main2 section' id='main2'>
							<div class='widget PopularPosts' data-version='1' id='PopularPosts1'>
								<h2>Postingan Popular</h2>
								<div class='widget-content popular-posts'>
									<ul>
									@php
									$model = App\post::orderBy('views','DESC')->take(3)->get();
									@endphp
										@foreach($model as $data)
										<li>
											<div class='item-content'>
												<div class='item-thumbnail'>
													@if($data->picture == null)
													<img src="{{ asset('/frontend/img/no_image.png') }}" style="width: 75px;height: 75px;">
													@endif
													<a href="{{ url('/post/'.$data->slug) }}" target="_blank"><img alt="" border="0" src="{{ asset('/img/thumb/'.$data->picture) }}" style="width: 75px;height: 75px;"></a>
												</div>
												<div class='item-title'>
													<a href="{{ url('/post/'.$data->slug) }}">{!! substr($data->judul, 0,10) !!}...</a>
												</div>
												<div class='item-snippet'>
													{!! substr($data->content, 0,90) !!}...
												</div>
											</div>
											<div style='clear: both;'></div>
									    </li>
										@endforeach			
									</ul>

									<div class='clear'></div>

									<span class='widget-item-control'>
										<span class='item-control blog-admin'>
											<a class='quickedit' href='http://www.blogger.com/rearrange?blogID=7622117892072889706&amp;widgetType=PopularPosts&amp;widgetId=PopularPosts1&amp;action=editWidget&amp;sectionId=main2' onclick='return _WidgetManager._PopupConfig(document.getElementById("PopularPosts1"));' target='configPopularPosts1' title='Edit'><img alt='' height='18' src='../../../resources.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/></a>
										</span>
									</span>
									<div class='clear'></div>
								</div>
							</div>
							<div class='widget PopularPosts' data-version='1' id='PopularPosts1'>
								<h2>Postingan Terbaru</h2>
								<div class='widget-content popular-posts'>
									<ul>
									@php
									$model = App\post::orderBy('created_at','DESC')->take(3)->get();
									@endphp
										@foreach($model as $data)
										<li>
											<div class='item-content'>
												<div class='item-thumbnail'>
													@if($data->picture == null)
													<img src="{{ asset('/frontend/img/no_image.png') }}" style="width: 75px;height: 75px;">
													@endif
													<a href="{{ url('/post/'.$data->slug) }}" target="_blank"><img alt="" border="0" src="{{ asset('/img/thumb/'.$data->picture) }}" style="width: 75px;height: 75px;"></a>
												</div>
												<div class='item-title'>
													<a href="{{ url('/post/'.$data->slug) }}">{!! substr($data->judul, 0,10) !!}...</a>
												</div>
												<div class='item-snippet'>
													{!! substr($data->content, 0,90) !!}...
												</div>
											</div>
											<div style='clear: both;'></div>
									    </li>
										@endforeach			
									</ul>

									<div class='clear'></div>

									<span class='widget-item-control'>
										<span class='item-control blog-admin'>
											<a class='quickedit' href='http://www.blogger.com/rearrange?blogID=7622117892072889706&amp;widgetType=PopularPosts&amp;widgetId=PopularPosts1&amp;action=editWidget&amp;sectionId=main2' onclick='return _WidgetManager._PopupConfig(document.getElementById("PopularPosts1"));' target='configPopularPosts1' title='Edit'><img alt='' height='18' src='../../../resources.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/></a>
										</span>
									</span>
									<div class='clear'></div>
								</div>
							</div>
							<div class='widget Label' data-version='1'>
								<h2>Kategori</h2>
								<div class='widget-content cloud-label-widget-content'>
									@php
									$model = App\m_kategori::all();
									@endphp
									@foreach($model as $data)
										<span class='label-size label-size-2'>
											<i class="fa fa-tag"></i>
											<a dir='ltr' href='{{ url('/kategori/'.$data->kategori) }}'>{{ $data->kategori }}</a>
											<span class='label-count' dir='ltr'>({{ App\post::where('kategori_id',$data->id)->count() }})</span>
										</span>
									@endforeach
									<div class='clear'></div>
								</div>
							</div>
							<div class='widget Label' data-version='1' id="live">
								<h2>Live Chat</h2>
								<div class='widget-content cloud-label-widget-content'>
									<script id="cid0020000178545260124" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 100%;height: 400px;">
										{"handle":"islamic-web","arch":"js","styles":{"a":"#00a6f2","b":100,"c":"FFFFFF","d":"FFFFFF","k":"#00a6f2","l":"#00a6f2","m":"#00a6f2","n":"FFFFFF","p":"9.18","q":"#00a6f2","r":100,"cnrs":"0.8","fwtickm":1}
										}
									</script>
									<div class='clear'></div>
								</div>
							</div>
							<div class='widget Label' data-version='1'>
								<h2 id="lokasi">Lokasi</h2>
								<div class='cloud-label-widget-content'>
									<div id="map"></div>
									<div style="background: #fff"><i class="fa custom fa-map" style="background: #00ABF5;color: #fff;"></i> Jln....</div>
									<div class='clear'></div>
								</div>
							</div>
							<div class='widget Label' data-version='1'>
								<h2></h2>
								<div class='cloud-label-widget-content'>
									
									<div class='clear'></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<div class='clear'></div>
			</div>
		</div>

		<div class='clear'></div>
		</div>

		{{-- footer --}}
		<div id="footer">
			<div class='footer-wrap'>
				<div class='section'>
					<div class='widget Header' data-version='1' id='Header1'>
						<h2 style="color: #fff; padding-left: 5px; padding-top: 10px;">Kontak</h2>
						<h5 style="color: #fff;"><span><i class="fa custom fa-phone" style="background: #fff;color: #000;"></i> 022-xxx-xx</span></h5>
						<h5 style="color: #fff; padding-bottom: 5px;"><span><i class="fa custom fa-send-o" style="background: #fff;color: #000;"></i> example@domain</span></h5>
					</div>
				</div>
			</div>
		</div>
		<div class='fleft'>
			<p>
				  Copyright &#169; 2017 ISLAMIC .<br>
				  <span style="color: #00A6F2;">Designed & Developed by Ari Ardiasnyah </span><br><br>
				  Template Shiroi by Johanes Djogan </a> Ported&Redesigned By <span style="color: red;">Ari Ardiansyah</span>
			</p>
		</div>

		{{-- script --}}
		<script src='{{ asset('/frontend/accordion-menu8896.js') }}' type='text/javascript'></script>
		<script type='text/javascript'>
			$(function() {
				$('.main2 .widget-content').hide();
				$('.main2 h2 #lokasi').addClass('active').next().slideDown('slow');
				$('.main2 h2').click(function() {
					if($(this).next().is(':hidden')) {
						$('.main2 h2').removeClass('active').next().slideUp('slow');
						$(this).toggleClass('active').next().slideDown('slow');
					}
				});
			});
		</script>
		<script src='{{ asset('/frontend/jquery.min.js') }}' type='text/javascript'></script>
		<script src='{{ asset('/frontend/jquery-ui.min.js') }}' type='text/javascript'></script>
		<script type='text/javascript'>
			$(document).ready(function(){  
				$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 6000, true);  
			}); 
		</script>
		{{-- plugin-scripts --}}
		<script id="dsq-count-scr" src="//{{ env('DISQUS_USERNAME') }}.disqus.com/count.js" async></script>
	    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO7ux0CVng-weBxmxNS7GpThvJvFqtLAQ&callback=initMap">
	    </script>
	    {{-- <script 
		 src="http://maps.google.com/maps/api/js?sensor=trueorfalse"> --}}
		</script>
		<script>
	      function initMap() {

	        var location = {lat: -25.363, lng: 131.044};
	        var map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 4,
	          center: location,
	          animation: google.maps.Animation.BOUNCE
	        });
	        var marker = new google.maps.Marker({
	          position: location,
	          map: map
	        });
	      }
	    </script>
	    <script type="text/javascript">
	    	// ===== Scroll to Top ==== 
			$(window).scroll(function() {
			    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
			        $('#return-to-top').fadeIn(200);    // Fade in the arrow
			    } else {
			        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
			    }
			});
			$('#return-to-top').click(function() {      // When arrow is clicked
			    $('body,html').animate({
			        scrollTop : 0                       // Scroll to top of body
			    }, 500);
			});
	    </script>
		<!--Start of Tawk.to Script-->
		<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5a6aa29ad7591465c7071a92/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
		</script>
		<!--End of Tawk.to Script-->
		<div id="mobile">
			<script id="cid0020000178545260124" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 100%;height: 400px;">
				{"handle":"islamic-web","arch":"js","styles":{"a":"#00a6f2","b":100,"c":"FFFFFF","d":"FFFFFF","k":"#00a6f2","l":"#00a6f2","m":"#00a6f2","n":"FFFFFF","p":"9.18","q":"#00a6f2","r":100,"cnrs":"0.8","fwtickm":1}
				}
			</script>
		</div>
		@stack('plugin-scripts')	
	</body>
</html>