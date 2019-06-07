@extends('layouts.admin')
@section('title')
ALOKASI
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
					Alokasi
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
  .table-hover td {
	cursor: pointer;
  }
</style>
@endpush

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							ALOKASI
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<a href="{{ url('/export/excel/alamal/all') }}" class="btn btn-sm btn-success m-btn--air"><i class="fa fa-download"></i> Semua</a>
					<a href="{{ url('/export/pdf/alamal/all') }}" class="btn btn-sm btn-danger m-btn--air"><i class="fa fa-download"></i> Semua</a>
				</div>
			</div>
			<div class="m-portlet__body">
				@include('interface.backend.plugin.date_filter')
				<form class="form" action="{{ url('export/pdf/alamal') }}" method="GET" id="pdf">
					{{ csrf_field() }}
					<input type="hidden" name="start" class="p_start">
					<input type="hidden" name="end" class="p_end">
				</form>
				<form class="form" action="{{ url('export/excel/alamal') }}" method="GET" id="excel">
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
       var d = data[4].split("/");
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
            ajax: "{{ url('/admin/alokasi/listamal') }}",
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
						
						{ data: 'kode',name: 'kode' , title: 'Kode Alokasi'},
						{ data: 'count.kode',name: 'count.kode' , title: 'Kode Perolehan'},
						{ data: 'jenis',name: 'jenis' , title: 'Jenis'},
						{ data: 'tanggal',name: 'tanggal' , title: 'Tanggal'},
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
				$('#row_1'+ row.data().id).hide();
     		    $('#row_2'+ row.data().id).hide();
     		    $('#row_3'+ row.data().id).hide();
				$('.d_'+row.data().count.id).hide();
				$('.d_data'+ row.data().id).hide();
	        }
	        else {
	            // Open this row
	            tdi.first().removeClass('fa-plus-square');
             	tdi.first().addClass('fa-minus-square');
          
				var d='<tr id="row_1'+row.data().id+'" style="background-color : rgb(235,235,235)" class="hide'+row.data().id+'">'+
			 			 '<td colspan="6"><strong>Detail Pembagian :</strong></td>'+
			 		  '</tr>'+
			 		  '<tr id="row_2'+row.data().id+'" style="background-color : rgb(245,245,245)" class="hide'+row.data().id+'">'+
			 		  	 '<td colspan="3">Jenis</td>'+
			 		  	 '<td colspan="3">Keterangan</td>'+
			 		  '</tr>'+
			 		  '<tr id="row_3'+row.data().id+'" style="background-color : rgb(235,235,235)" class="hide'+row.data().id+'">'+
			 			 '<td colspan="6"><strong>Detail Perolehan :</strong></td>'+
			 		  '</tr>';
	            tr.after(d);
	            tr.removeClass('hide');
				tr.addClass('show');
	            $.each(row.data().count.ket, function(index, obj){
			    		var detail = '<tr style="background-color:rgb(250,250,250)" class="d_'+row.data().count.id+'">'+
			    						'<td colspan="3" style="text-align:left;vertical-align: top;"><i class="fa fa-circle-thin"></i> Zakat '+index+'</td>'+
			    						'<td colspan="3" id="detail'+row.data().count.id+'"></td>'
			    					  '<tr>';
				   		$('#row_3'+row.data().id).after(detail);
				   		$.each(obj, function(i, val){
					    		var det = '<span class="pull-left"><i class="fa fa-circle-thin"></i> '+i+'</span>'+
					    				  '<span class="pull-right">'+val+'</span> <br>';
						   		$('#detail'+ row.data().count.id).append(det);
					   	 });
			   	 });
	            $.each(row.data().ket, function(index, obj){
			    		var detail = '<tr class="d_data'+ row.data().id +'"">'+
			    						'<td colspan="3">'+index+'</td>'+
			    						'<td colspan="3" id="detail_2'+row.data().count.id+'"></td>'
			    					  '</tr>';
				   		$('#row_2'+ row.data().id).after(detail);
				   		$.each(obj, function(i, val){
					    		var det = '<span class="pull-left"><i class="fa fa-circle-thin"></i> '+i+'</span>'+
					    				  '<span class="pull-right">'+val+'</span> <br>';
						   		$('#detail_2'+ row.data().count.id).append(det);
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