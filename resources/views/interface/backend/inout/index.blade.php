@extends('layouts.admin')

@push('plugin-styles')
<link href="{{ asset('/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
RIWAYAT
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
					RIWAYAT
				</span>
			</a>
		</li>
		<li class="m-nav__separator">
			-
		</li>
		<li class="m-nav__item">
			<a class="m-nav__link">
				<span class="m-nav__link-text">
					Masuk & Keluar
				</span>
			</a>
		</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="m-portlet m-portlet--brand">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Data
							<small>
								Masuk Dan Keluar
							</small>
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<a href="{{ url('/export/excel/inout/all') }}" class="btn btn-sm btn-success m-btn--air"><i class="fa fa-download"></i> Semua</a>
					<a href="{{ url('/export/pdf/inout/all') }}" class="btn btn-sm btn-danger m-btn--air"><i class="fa fa-download"></i> Semua</a>
				</div>
			</div>
			<div class="m-portlet__body">
				@include('interface.backend.plugin.date_filter')
				<form class="form" action="{{ url('export/pdf/inout') }}" method="GET" id="pdf">
					{{ csrf_field() }}
					<input type="hidden" name="start" class="p_start">
					<input type="hidden" name="end" class="p_end">
				</form>
				<form class="form" action="{{ url('export/excel/inout') }}" method="GET" id="excel">
					{{ csrf_field() }}
					<input type="hidden" name="start" class="p_start">
					<input type="hidden" name="end" class="p_end">
				</form>

				<!--begin: Datatable -->
					<table id="m-datatable" class="table table-striped table-hover">
	
					</table>
				<!--end: Datatable -->
				
			</div>
		</div>
	</div>
</div>
@endsection
@push('plugin-scripts')
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.number.min.js') }}" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
	 $(document).ready(function () { 
	   $('.input-daterange input').each(function() {
	      $(this).datepicker('clearDates');
	   });
       $.fn.dataTable.ext.search.push(
           function (settings, data, dataIndex) {
               var min = $('#min').datepicker("getDate");
               var max = $('#max').datepicker("getDate");
               // need to change str order before making  date obect since it uses a new Date("mm/dd/yyyy") format for short date.
               var d = data[3].split("/");
               var startDate = new Date(d[1]+ "/" +  d[0] +"/" + d[2]);
    
               if (min == null && max == null) { return true; }
               if (min == null && startDate <= max) { return true;}
               if(max == null && startDate >= min) {return true;}
               if (startDate <= max && startDate >= min) { return true; }
               return false;
           }
       );
    
    
       $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true , dateFormat:"dd/mm/yy"});
       $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy" });
       var table =	$('#m-datatable').DataTable({
       					language: {
		                            url: "{{ asset('datatables/custom.json') }}",
		                          },
					    responsive: true,
					    processing: true,
					    severSide: true,
					    ajax: '{{ url('/api/history') }}',
					    columns:[
					    { data: 'jenis',name: 'jenis' , title: 'Jenis'},
					    	{ data: 'jumlah', name: 'jumlah' , title: 'Jumlah'},
					    	{ data: 'keterangan',name: 'keterangan' , title: 'Keterangan'},
					    	{ data: 'tanggal',name: 'tanggal' , title: 'Tanggal'},
					    ],
					    aaSorting: []
				    });
    
       // Event listener to the two range filtering inputs to redraw on input
       $('#min, #max').change(function () {
           table.draw();
           $('.p_start').val($('#min').val());
           $('.p_end').val($('#max').val());
       });
    });
</script>
@endpush