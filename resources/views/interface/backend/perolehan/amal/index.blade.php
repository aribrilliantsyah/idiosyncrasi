@extends('layouts.admin')

@push('plugin-styles')
<link href="{{ asset('/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.0/css/dataTables.responsive.css">
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
    font-size: 14px;
  }
</style>
@endpush
@section('title')
PEROLEHAN
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
					Perolehan
				</span>
			</a>
		</li>
		<li class="m-nav__separator">
			-
		</li>
		<li class="m-nav__item">
			<a class="m-nav__link">
				<span class="m-nav__link-text">
					Infaq Dan Sodaqoh
				</span>
			</a>
		</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							PEROLEHAN
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<a href="{{ url('/export/excel/camal/all') }}" class="btn btn-sm btn-success m-btn--air"><i class="fa fa-download"></i> Semua</a>
					<a href="{{ url('/export/pdf/camal/all') }}" class="btn btn-sm btn-danger m-btn--air"><i class="fa fa-download"></i> Semua</a>
				</div>
			</div>
			<div class="m-portlet__body">
				@include('interface.backend.plugin.date_filter')
				<form class="form" action="{{ url('export/pdf/camal') }}" method="GET" id="pdf">
					{{ csrf_field() }}
					<input type="hidden" name="start" class="p_start">
					<input type="hidden" name="end" class="p_end">
				</form>
				<form class="form" action="{{ url('export/excel/camal') }}" method="GET" id="excel">
					{{ csrf_field() }}
					<input type="hidden" name="start" class="p_start">
					<input type="hidden" name="end" class="p_end">
				</form>


				<!--begin: Datatable -->
					<table id="m-datatable" class="table table-hover">
	
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
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript">

			
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

	$(document).ready(function(){

		var table = $('#m-datatable').DataTable({
				language: {
				            url: "{{ asset('datatables/custom.json') }}",
				          },
				processing: true,
                ajax: "{{ url('/admin/perolehan/listamal') }}",
                columns: [
                			{
				                "className":      'details-control',
				                "orderable":      false,
				                "searchlable": false,
				                "data":           null,
				                "defaultContent": '',
				                "render": function () {
			                         return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
			                     },
			                     width:"15px"
				            },
							
							{ data: 'kode',name: 'kode' , title: 'Kode'},
							{ data: 'jenis',name: 'jenis' , title: 'Jenis'},
							{ data: 'tanggal',name: 'tanggal' , title: 'Tanggal'},
							{ data: 'status',name: 'status' , title: 'Status'},
							{ data: 'action',name: 'action' , title: 'Aksi', orderable: false, searchable: false},
						],
						aaSorting: []

            });
			$('#m-datatable tbody').on('click', 'td.details-control', function () {
		        var tr = $(this).closest('tr');
		        var tdi = tr.find("i.fa");
		        var row = table.row( tr );
		 		
		        if ( tr.hasClass('show') ) {
		            // This row is already open - close it
		            tdi.first().removeClass('fa-minus-square');
                 	tdi.first().addClass('fa-plus-square');
		            tr.removeClass('show');
					tr.addClass('hide');
					$('.d_'+row.data().id).hide();
		        }
		        else {
		            // Open this row
		            tdi.first().removeClass('fa-plus-square');
                 	tdi.first().addClass('fa-minus-square');
		            $.each(row.data().ket, function(index, obj){
				    		var detail = '<tr style="background-color:rgb(235,235,235)" class="d_'+row.data().id+'">'+
				    						'<td colspan="3" style="text-align:left;vertical-align: top;"><i class="fa fa-circle-thin"></i>  '+index+'</td>'+
				    						'<td colspan="3" id="detail'+row.data().id+'"></td>'
				    					  '<tr>';
					   		tr.after(detail);
					   		tr.removeClass('hide');
					   		tr.addClass('show');
					   		$.each(obj, function(i, val){
						    		var det = '<span class="pull-left"><i class="fa fa-circle-thin"></i> '+i+'</span>'+
						    				  '<span class="pull-right">'+val+'</span> <br>';
							   		$('#detail'+ row.data().id).append(det);
						   	 });
				   	 });
		        }
		    });
		    $('#min, #max').change(function () {
	           table.draw();
	           $('.p_start').val($('#min').val());
	           $('.p_end').val($('#max').val());
	      	});
    });
   

</script>
@endpush

