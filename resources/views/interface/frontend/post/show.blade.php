@extends('layouts.user')
@section('content')
<div class="section-bg-image bg-top white" style="background-image:url(../images/hd-8.jpg)">
    <div class="container content">
        <hr class="space" />
        <hr class="space m" />
        <div class="row">
            <div class="col-md-8 col-center text-center">
                <h2>{{ $data->judul }}</h2>
            </div>
        </div>
        <hr class="space" />
        <hr class="space" />
        <hr class="space" />
    </div>
</div>
<div class="section-empty section-item">
	<div class="container content">
		<div class="row">
			<div class="col-md-9 col-sm-12">
				<div class="flexslider slider nav-inner row-17">
					<ul class="slides">
						<li>
							<a class="img-box">
								<img src="{{asset('/img/cover/'.$data->picture)}}" alt="" />
							</a>
						</li>
					</ul>
				</div>
				<hr class="space" />
				<div class="row">
					<div class="col-md-6 hidden-xs">
						<div class="tag-row">
							<span><i class="fa fa-calendar"></i> <a href="#">{{ date('d F, Y', strtotime($data->created_at)) }}</a></span>
							<span><i class="fa fa-bookmark"></i> <a href="#">{{ $data->kategori->kategori }}</a></span>
							<span><i class="fa fa-pencil"></i><a href="#">Admin</a></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="sharethis-inline-share-buttons"></div>
					</div>
				</div>
				<hr class="space m" />
				<div class="row">
						<div class="col-md-12">
							{!! $data->content !!}
						</div>
					</div>
				</div>
				@include('interface.frontend.plugin')
			</div>
		</div>
	</div>
	<div id="comments" class="section-empty">
		<div class="container content">
			<div class="row">
				<div class="col-md-9">
					<div id="disqus_thread"></div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('script')
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5ace2912cb29150013b9390d&product=inline-share-buttons"></script>
@endpush