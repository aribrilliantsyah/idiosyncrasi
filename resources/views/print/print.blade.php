@extends('layouts.admin')
@section('title')
Print Laporan
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
  textarea {
	  width: 100%;
	  min-height: 100px;
	  resize: vertical;
	  margin: 0;
	}
</style>
@endpush

@section('content')
<div class="col-sm-12">
		<div class="m-portlet" id="count">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="fa fa-print"></i>
							<small>
								Print Menu
							</small>
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools" id="tools">
					<button class="btn btn-info btn-sm" id="ubah"><i class="fa fa-pencil"></i> Ubah</button>
					<button class="btn btn-success btn-sm" id="save" style="display: none;"><i class="fa fa-download"></i> Save</button>
					<button class="btn btn-primary btn-sm" id="print"><i class="fa fa-print"></i> Print Pdf</button>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="print">
					<table style="" class="table table-bordered m-table m-table--border-brand">
						<tbody>
							<tr>
								<td style="width: 10px; text-align: center;vertical-align: middle;" rowspan="3">&nbsp;Logo</td>
								<td style="width: 450px; text-align: center; vertical-align: middle; font-size: 30px;" rowspan="3" class="editable">Nama Lembaga (Islamic)</td>
								<td style="width: 5px;">Tanggal</td>
								<td style="width: 56px; text-align: right;">{{ date('d') }}</td>
							</tr>
							<tr>
								<td style="width: 5px;">Bulan</td>
								<td style="width: 56px; text-align: right;">{{ date('m') }}</td>
							</tr>
							<tr>
								<td style="width: 5px;">Tahun</td>
								<td style="width: 56px; text-align: right;">{{ date('Y') }}</td>
							</tr>
							<tr>
								<td style="width: 89px;" colspan="4"><center>{{ $judul }}</center></td>
							</tr>
							<tr>
								<td style="width: 89px; text-align: center;" colspan="4" class="editable">Puji syukur Alhamdulillah, kami panjatkan kehadirat Allah SWT atas rahmat dan ridho-Nya. Kami selaku Pengurus </td>
							</tr>
							<tr>
								<td style="width: 89px; text-align: center;" colspan="4">Detail Perolehan:</td>
							</tr>

								@foreach($laporan->count->ket as $key => $value)
								<tr>
									<td style="text-align: left;vertical-align: top;" colspan="1"><i class="fa fa-circle-thin"></i> Zakat {{ $key }}</td>
									<td colspan="3">
									@foreach($value as $i => $d)
									<span class="pull-left"><i class="fa fa-circle-thin"></i> {{ $i }}</span>
									<span class="pull-right">{{ $d }}</i></span><br>
									@endforeach
									</td>
								</tr>
							    @endforeach
							<tr>
								<td style="width: 89px; text-align: center;" colspan="4">Detai Pembagian:</td>
							</tr>
								@if($jenis == 'mal' || $jenis == 'amal')
								@foreach($laporan->ket as $key => $value)
								<tr>
									<td style="text-align: left;vertical-align: top;" colspan="1"><i class="fa fa-circle-thin"></i> {{ $key }}</td>
									<td colspan="3">
									@foreach($value as $i => $d)
									<span class="pull-left"><i class="fa fa-circle-thin"></i> {{ $i }}</span>
									<span class="pull-right">{{ $d }}</i></span><br>
									@endforeach
									</td>
								</tr>
							    @endforeach
							    @else
							    <tr>
									<td style="text-align: left;vertical-align: top;" colspan="1"> Mustahik</td>
									<td style="text-align: left;vertical-align: top;" colspan="3"> Jumlah Orang</td>
								</tr>
							    @foreach($laporan->ket as $key => $value)
								<tr>
									<td style="text-align: left;vertical-align: top;" colspan="1"><i class="fa fa-circle-thin"></i> {{ $key }}</td>
									<td style="text-align: left;vertical-align: top;" colspan="3"><i class="fa fa-circle-thin"></i> {{ $value }} Orang</td>
								</tr>
								@endforeach
							    @endif
{{-- 							    <tr>
									<td style="text-align: left;vertical-align: top;" colspan="1">Total Mustahik </td>
									<td style="text-align: left;vertical-align: top;" colspan="3"><i class="fa fa-circle-thin"></i> {{ }} Orang</td>
								</tr> --}}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('plugin-scripts')
<script type="text/javascript">
  $(document).ready(function(){
      $("#print").click(function(){
      	var mode = 'iframe'; //popup
	    var close = mode == "popup";
	    var options = { mode : mode, popClose : close};
      $("div .print").printArea( options ); 
      }); 

      $("#ubah").click(function(){
      	$(this).hide();
      	$('#save').show();
      	$('.editable').each(function(){
		   var content = $(this).html();
		   $(this).html('<textarea>' + content + '</textarea>');
		});  
      });
	  $('#save').click(function(){
	    $('#save').hide();
	    $('textarea').each(function(){
	       var content = $(this).val();//.replace(/\n/g,"<br>");
	       $(this).html(content);
	       $(this).contents().unwrap();    
	    }); 

	    $('#ubah').show(); 
	  });
});
</script>
@endpush