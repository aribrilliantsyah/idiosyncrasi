@extends('layouts.admin')
@push('plugin-styles')
<link href="{{ asset('/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">
  .table thead tr th{
    vertical-align: middle;
    text-align: center;
  }
  .table tbody tr td{
    vertical-align: middle;
    text-align: center;
  }

  #m-datatable th, #m-datatable td {
    font-size: 13px;
  }
</style>
@endpush
@section('title')
Brand
@endsection
@section('bread')
	<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
		<li class="m-nav__item m-nav__item--home">
			<a href="{{ url('/welcome') }}" class="m-nav__link m-nav__link--icon">
				<i class="m-nav__link-icon la la-home"></i>
			</a>
		</li>
		<li class="m-nav__separator">
			-
		</li>
		<li class="m-nav__item">
			<a class="m-nav__link">
				<span class="m-nav__link-text">
					Brand
				</span>
			</a>
		</li>
		<li class="m-nav__separator">
			-
		</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Daftar Brand
						</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <a href="{{ route('brand.create') }}" class="btn btn-sm btn-accent m-btn--air m-btn--pill "><i class="fa fa-plus"></i> Tambah Brand </a>
                </div>
			</div>
			<div class="m-portlet__body">
                <div class="row">
                    @foreach($data as $item)
                        <div class="col-md-4">
                            <div class="m-portlet m-portlet--mobile">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                                <a href="{{route('brand.edit',$item->id)}}" class="btn btn-xs btn-outline-accent m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--pill m-btn--air"><i class="fa fa-edit"></i></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                        <a href="{{url('admin/brand/'.$item->id.'/delete')}}" class="btn btn-xs btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--pill m-btn--air"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div style="background: #999">
                                        <img src="{{asset('img/brand/'. $item->img)}}" style="max-width: 100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                            {{$data->render()}}
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('plugin-scripts')
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/skins/bootstrapck') }}"></script>
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script>

</script>
@endpush