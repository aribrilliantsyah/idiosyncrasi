@extends('layouts.user')
@section('content')
<div class="section-bg-image bg-top white" style="background-image:url(../images/hd-9.jpg)">
    <div class="container content">
        <hr class="space" />
        <hr class="space m" />
        <div class="row">
            <div class="col-md-8 col-center text-center">
                <h2>Blog</h2>
                    <h4>Kami menyajikan laporan hasil pengelolaan,dan informasi seputar islam lainnya</h4>
            </div>
        </div>
        <hr class="space" />
        <hr class="space" />
    </div>
</div>

<div class="section-bg-color">
	<div class="container content">
		<div class="row">
			<div class="col-md-9 col-sm-12">
				@if($posts1->count() == 0)
				Tidak ada postingan
				@else
				<div class="grid-list grid-layout grid-15">
					<div class="grid-box row">
						@foreach($posts1 as $data)
						<div class="grid-item col-md-6 fade-bottom" style="display: block; transition-duration: 300ms; animation-duration: 300ms; transition-timing-function: ease; transition-delay: 0ms;">
							<div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse" data-anima="scale-rotate" data-trigger="hover">
								<div class="block-infos">
									<div class="block-data">
										<p class="bd-day">{{ date_format($data->created_at,'d') }}</p>
										<p class="bd-month">{{ date_format($data->created_at,'F Y') }}</p>
									</div>
									<a class="block-comment" href="#">2 <i class="fa fa-comment-o"></i></a>
								</div>
								<a class="img-box" href="{{url('/post/'.$data->slug)}}"><img class="anima" src="{{ asset('/img/cover/'.$data->picture) }}" alt="" aid="0.8130302374609695" style="position: relative; transition-duration: 500ms; animation-duration: 500ms; transition-timing-function: ease; transition-delay: 0ms;" height="300px"></a>
								<div class="advs-box-content">
									<h2 class="text-m"><a href="#">{{ $data->judul }}</a></h2>
									<div class="tag-row">
										<span><i class="fa fa-bookmark"></i><a href="#">{{ $data->kategori->kategori }}</a></span>
										<span><i class="fa fa-pencil"></i><a href="#">Admin</a></span>
										<span><i class="fa fa-user"></i><a href="#">{{ $data->views }}</a></span>
									</div>
									<p class="niche-box-content">
										 {!! substr($data->content,0,100).'...' !!}
									</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="list-nav text-left">
						{!! $posts1->render('vendor.pagination.hwt') !!}
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
