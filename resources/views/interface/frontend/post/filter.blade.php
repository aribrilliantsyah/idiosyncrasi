{{-- @extends('layouts.frontend')
@section('content')
<div class='main section' id='main'>
	<div class='widget Blog' data-version='1' id='Blog1'>
		<div class='blog-posts hfeed'>
			@if($i == "search")
			<h2 class='pagetitle'>Pencarian dengan kata kunci {{ $key }}</h2>
			@else
			<h2 class='pagetitle'>Postingan dengan Kategori {{ $key }}</h2>
			@endif
			<!--Can't find substitution for tag [defaultAdStart]-->
			<div class="date-outer">
				<div class="date-posts">
					@if($result->count() == 0)
					<div class='post-outer'>
						<div style="background: rgb(255,255,255);">
							<div class='postright'>
								<div class='arrow'></div>
								<div class='cover'>
									<div class="spoiler" style="padding-bottom: 10px;">
										@if($i == "search")
										<p>Tidak ada hasil dengan kata kunci {{ $key }}.</p>
										@else
										<p>Tidak ada postingan dengan Kategori {{ $key }}.</p>
										@endif
									</div>

								</div>
							</div>
						</div>
					</div>					
					@endif
					@foreach($result as $data)
					<div class='post-outer'>
						<div class='post hentry'>
							<div class='postright'>
								<div class='arrow'></div>
								<div class='cover'>
									<div class='crop-wrap'>
										@if($data->picture == null)
										<div><img src="{{ asset('/frontend/img/no_image.png') }}"></div>
										@else
										<div><img src="{{ asset('/img/thumb/'.$data->picture) }}"></div>
										@endif
									</div>
									<h2><a href='' rel=''>{{ $data->judul }}</a></h2>
									<div style='clear: both;'></div>
									<div class='jomore'>
										<span class='author1'>Posted by : Admin</span>
										<div class='timemeta'>{{date('D, F d Y',strtotime($data->created_at)) }}</div>
										<a class='comment-link' href=''>0 Comments</a>
										<div style='clear: both;'></div>
										<div class="spoiler">
											@php
											$content = preg_replace("/<img[^>]+\>/i", "(Gambar)", $data->content); 
											@endphp
											{!! substr($content, 0,60) !!}
										</div>
										<div class='jomorelink'>
											<a class='anes' href='{{ url('/post/'.$data->slug) }}'>Selengkapnya</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class='clear'></div>

		<div class='blog-pager' id='blog-pager'>
			{{ $result->links('vendor.pagination.anime') }}
		</div>

		<div class='clear'></div>
	</div>
</div>
@endsection --}}
@extends('layouts.user')
@section('content')
<div class="section-bg-image bg-top white" style="background-image:url(../images/hd-9.jpg)">
    <div class="container content">
        <hr class="space" />
        <hr class="space m" />
        <div class="row">
            <div class="col-md-8 col-center text-center">
                <h2>Blog</h2>
                    <h4>Blog seputar laporan dan informasi tentang islam yang disajikan secara aktual dan terpercaya.</h4>
            </div>
        </div>
        <hr class="space" />
        <hr class="space" />
    </div>
</div>

<div class="section-bg-color">
	<div class="container content">
		<div class="row">
			@if($i == "search")
			<h4 class='pagetitle'>Pencarian dengan kata kunci {{ $key }}</h4>
			@else
			<h4 class='pagetitle'>Postingan dengan Kategori {{ $key }}</h4>
			@endif
			<div class="col-md-9 col-sm-12">
				@if($result->count() == 0)
				Tidak ada postingan
				@else
				<div class="grid-list grid-layout grid-15">
					<div class="grid-box row">
						@foreach($result as $data)
						<div class="grid-item col-md-6 fade-bottom" style="display: block; transition-duration: 300ms; animation-duration: 300ms; transition-timing-function: ease; transition-delay: 0ms;">
							<div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse" data-anima="scale-rotate" data-trigger="hover">
								<div class="block-infos">
									<div class="block-data">
										<p class="bd-day">{{ date('d',strtotime($data->created_at)) }}</p>
										<p class="bd-month">{{ date('F Y',strtotime($data->created_at)) }}</p>
									</div>
									<a class="block-comment" href="#">2 <i class="fa fa-comment-o"></i></a>
								</div>
								<a class="img-box" href="{{url('/post/'.$data->slug)}}"><img class="anima" src="{{ asset('/img/cover/'.$data->picture) }}" alt="" aid="0.8130302374609695" style="position: relative; transition-duration: 500ms; animation-duration: 500ms; transition-timing-function: ease; transition-delay: 0ms;"></a>
								<div class="advs-box-content">
									<h2 class="text-m"><a href="#">{{ $data->judul }}</a></h2>
									<div class="tag-row">
										<span><i class="fa fa-bookmark"></i><a href="#">{{ $data->kategori }}</a></span>
										<span><i class="fa fa-pencil"></i><a href="#">Admin</a></span>
										<span><i class="fa fa-user"></i><a href="#">{{ $data->views }}</a></span>
									</div>
									<p class="niche-box-content">
										 {!! substr($data->content,0,150).'...' !!}
									</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="list-nav text-left">
						{!! $result->render('vendor.pagination.hwt') !!}
						{{-- pagination --}}
						
					</div>
				</div>
				@endif
			</div>
			@include('interface.frontend.plugin')
		</div>
	</div>
</div>

@endsection
