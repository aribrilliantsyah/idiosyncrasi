@extends('layouts.admin')
@section('title')
Post
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">
		<!--begin:: Widgets/Blog-->
		
		<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<button type="button" class="btn btn-sm m-btn--pill  btn-brand"><i class="fa fa-eye"></i> Views : {{ $model->views }}</button>
					<button type="button" class="btn btn-sm m-btn--pill  btn-primary"><i class="fa fa-tag"></i> Kategori : {{ $model->kategori->name }}</button>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="m-widget19">
					<div class="m-widget19__content">				
						<div class="m-widget19__body">
							<h1>{{ $model->judul }}</h1>
							<br>
							<hr>
							{!! $model->content !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end:: Widgets/Blog-->	
</div>
</div>
@endsection
@push('plugin-scripts')
{{-- Scripts --}}
@endpush