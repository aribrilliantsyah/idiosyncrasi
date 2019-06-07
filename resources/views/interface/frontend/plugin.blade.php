<div class="col-md-3 col-sm-12 widget">
		<form action='{{ url('/search') }}' id='search' name="search" method="get">
			{{ csrf_field() }}
			<div class="input-group search-blog list-blog">
				<input name="jenis" value="search" type="hidden" />
				<input name='search' class="form-control" placeholder='Cari Sesuatu..' type='text'/>
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default" type="button">Go!</button>
				</span>
			</div>
		</form>
		
	<hr class="space s">
	<div class="list-group list-blog">
		@php
		$model = App\m_kategori::all();
		@endphp
		<p class="list-group-item active">Kategori</p>
		@foreach($model as $data)
			<span class='label-size label-size-2'>
				<a class="list-group-item" dir='ltr' href='{{ url('/kategori/'.$data->kategori) }}'>{{ $data->kategori }}</a>
			</span>
		@endforeach
		
	</div>
	<div class="list-group latest-post-list list-blog">
		<p class="list-group-item active">Postingan Terbaru</p>
		@foreach(App\post::all() as $data)
		<div class="list-group-item">
			<div class="row">
				<div class="col-md-4">
					<a class="img-box circle"><img src="{{ asset('/img/cover/'.$data->picture) }}" alt=""></a>
				</div>
				<div class="col-md-8">
					<a href="#"><h5>{{ $data->judul }}</h5></a>
					<div class="tag-row icon-row">
						<span><i class="fa fa-calendar"></i>{{ date_format($data->created_at,'d.m.Y') }}</span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>