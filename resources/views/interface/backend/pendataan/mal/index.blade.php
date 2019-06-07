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
    font-size: 13px;
  }
</style>
@endpush
@section('title')
Pendataan
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
					Pendataan
				</span>
			</a>
		</li>
		<li class="m-nav__separator">
			-
		</li>
		<li class="m-nav__item">
			<a class="m-nav__link">
				<span class="m-nav__link-text">
					Zakat Mal
				</span>
			</a>
		</li>
	</ul>
@endsection
@section('content')
<div class="row">
<div class="col-sm-12">
    <div class="m-portlet" id="count">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-list-3"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        PEROLEHAN
                        <small>
                            Bulan sekarang
                        </small>
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools" id="tools">
            </div>
        </div>
        <div class="m-portlet__body">
            <ul class="nav nav-tabs  m-tabs-line m-tabs-line--brand" role="tablist">
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#c_emas" role="tab" aria-selected="true">
                        <i class="flaticon-list-2"></i> Zakat Emas
                    </a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#c_perak" role="tab" aria-selected="false">
                        <i class="flaticon-list-2"></i> Zakat Perak
                    </a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#c_harta" role="tab" aria-selected="false">
                        <i class="flaticon-list-2"></i> Zakat Harta
                    </a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#c_pertanian" role="tab" aria-selected="false">
                        <i class="flaticon-list-2"></i> Zakat Pertanian
                    </a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#c_temuan" role="tab" aria-selected="false">
                        <i class="flaticon-list-2"></i> Zakat Harta Temuan
                    </a>
                </li>
            </ul>
             <div class="tab-content">
                <div class="tab-pane active show" id="c_emas" role="tabpanel">
                    
                </div>
                <div class="tab-pane" id="c_perak" role="tabpanel">
                    
                </div>
                <div class="tab-pane" id="c_harta" role="tabpanel">
                    
                </div>
                <div class="tab-pane" id="c_pertanian" role="tabpanel">
                    
                </div>
                <div class="tab-pane" id="c_temuan" role="tabpanel">
                    
                </div>
            </div>      
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-list-2"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        DATA
                        <small>
                            Bulan sekarang
                        </small>
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-form m-form--label-align-brand m--margin-top-10 m--margin-bottom-20">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        {{-- --}}
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <button class="btn btn-sm btn-outline-danger m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air" id="delsel"><i class="fa fa-trash"></i> Hapus data </button>
                        <button onclick="addForm()" class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air"><i class="fa fa-plus"></i> Tambah Data </button>
                    </div>
                </div>
            </div>


            <!--begin: Datatable -->
                <table id="m-datatable" class="table table-striped table-hover">

                </table>


            <!--end: Datatable -->
            
        </div>
    </div>
</div>    
</div>
@include('interface.backend.pendataan.mal.form')
@endsection
@push('plugin-scripts')
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.js"></script>
{{-- <script src="{{ asset('/js/jquery.number.min.js') }}" type="text/javascript"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script type="text/javascript">
    //count
    function count() {
        $.get('/admin/count/mal',function(data){
            var emas =  '<table class="table m-table m-table--head-separator-brand" style="font-size:13px;">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th>Jumlah Muzzaki Uang</th>'+
                                    '<th>Total Perolehan Uang</th>'+
                                    '<th>Jumlah Muzzaki Perhiasan</th>'+
                                    '<th>Total Perolehan Perhiasan</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>'+ data.Emas.Muzzaki_Uang +'</td>'+
                                    '<td>'+ data.Emas.Total_Uang +'</td>'+
                                    '<td>'+ data.Emas.Muzzaki_Perhiasan +'</td>'+
                                    '<td>'+ data.Emas.Total_Perhiasan +'</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>';
            var perak = '<table class="table m-table m-table--head-separator-brand" style="font-size:13px;">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th>Jumlah Muzzaki Uang</th>'+
                                    '<th>Total Perolehan Uang</th>'+
                                    '<th>Jumlah Muzzaki Perhiasan</th>'+
                                    '<th>Total Perolehan Perhiasan</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>'+ data.Perak.Muzzaki_Uang +'</td>'+
                                    '<td>'+ data.Perak.Total_Uang +'</td>'+
                                    '<td>'+ data.Perak.Muzzaki_Perhiasan +'</td>'+
                                    '<td>'+ data.Perak.Total_Perhiasan +'</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>';
             var harta ='<table class="table m-table m-table--head-separator-brand" style="font-size:13px;">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th>Jumlah Muzzaki </th>'+
                                    '<th>Total Perolehan</th>'+
                                '<tr>'+
                            '</thead>'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>'+ data.Harta.Muzzaki +'</td>'+
                                    '<td>'+ data.Harta.Total +'</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>';
            var pertanian = '<table class="table m-table m-table--head-separator-brand" style="font-size:13px;">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th>Jumlah Muzzaki </th>'+
                                    '<th>Total Perolehan</th>'+
                                '<tr>'+
                            '</thead>'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>'+ data.Pertanian.Muzzaki +'</td>'+
                                    '<td>'+ data.Pertanian.Total +'</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>';
            var temuan = '<table class="table m-table m-table--head-separator-brand" style="font-size:13px;">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th>Jumlah Muzzaki </th>'+
                                    '<th>Total Perolehan</th>'+
                                '<tr>'+
                            '</thead>'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>'+ data.Temuan.Muzzaki +'</td>'+
                                    '<td>'+ data.Temuan.Total +'</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>';
            $('#c_emas').html(emas);
            $('#c_perak').html(perak);
            $('#c_harta').html(harta);
            $('#c_pertanian').html(pertanian);
            $('#c_temuan').html(temuan);
            $('#tools').html('<button class="btn btn-sm btn-success m-btn--air m-btn--pill " id="save_count"><i class="fa fa-save"></i> Simpan Hasil</button>');
            //save_count
            var ket = data;
            $('#save_count').click(function(){
                var today = new Date();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();
                var d = yyyy+''+00+mm;
                    $.get('/admin/count/cek/mal/'+ d ,function(data){
                        if(data.count == 0){
                            $('#save_count').prop('disabled',true);
                            $.ajax({
                                     url:'{{ url('/admin/save/count/mal') }}',
                                     method:'POST',
                                     data:{
                                            '_token': '{{ csrf_token() }}',
                                            'ket': ket,
                                            'kode': d,
                                            'method': "create"
                                          },
                                     success:function(){
                                       toastr.options = {
                                            "closeButton": true,
                                            "debug": false,
                                            "newestOnTop": false,
                                            "progressBar": false,
                                            "positionClass": "toast-top-right",
                                            "preventDuplicates": false,
                                            "onclick": null,
                                            "showDuration": "300",
                                            "hideDuration": "1000",
                                            "timeOut": "5000",
                                            "extendedTimeOut": "1000",
                                            "showEasing": "swing",
                                            "hideEasing": "linear",
                                            "showMethod": "fadeIn",
                                            "hideMethod": "fadeOut"
                                            };

                                            toastr.success("Data tersimpan","Berhasil");
                                            $('#save_count').prop('disabled',false);
                                     },
                                     error: function (xhr, ajaxOptions, thrownError) {
                                            toastr.options = {
                                            "closeButton": true,
                                            "debug": false,
                                            "newestOnTop": false,
                                            "progressBar": false,
                                            "positionClass": "toast-top-right",
                                            "preventDuplicates": false,
                                            "onclick": null,
                                            "showDuration": "300",
                                            "hideDuration": "1000",
                                            "timeOut": "5000",
                                            "extendedTimeOut": "1000",
                                            "showEasing": "swing",
                                            "hideEasing": "linear",
                                            "showMethod": "fadeIn",
                                            "hideMethod": "fadeOut"
                                            };

                                            toastr.error("Please Contact Devloper","Failed");
                                            $('#save_count').prop('disabled',false);
                                     }
                                 
                            });
                        }else if(data.count > 0){
                            swal({
                              title: 'Akan terjadi perubahan terhadap data sebelumnya!',
                              text: "",
                              type: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'OK',
                              cancelButtonText: 'Batal',
                              animation: false,
                              customClass: 'animated fadeinDown'
                            }).then(function () {
                                $('#save_count').prop('disabled',true);
                                $.ajax({
                                     url:'{{ url('/admin/save/count/mal') }}',
                                     method:'POST',
                                     data:{
                                            '_token': '{{ csrf_token() }}',
                                            'ket': ket,
                                            'kode': d,
                                            'method': "update",
                                            'id': data.id
                                          },
                                     success:function(){
                                       toastr.options = {
                                            "closeButton": true,
                                            "debug": false,
                                            "newestOnTop": false,
                                            "progressBar": false,
                                            "positionClass": "toast-top-right",
                                            "preventDuplicates": false,
                                            "onclick": null,
                                            "showDuration": "300",
                                            "hideDuration": "1000",
                                            "timeOut": "5000",
                                            "extendedTimeOut": "1000",
                                            "showEasing": "swing",
                                            "hideEasing": "linear",
                                            "showMethod": "fadeIn",
                                            "hideMethod": "fadeOut"
                                            };

                                            toastr.success("Data diperbaharui","Berhasil");
                                            $('#save_count').prop('disabled',false)
                                     },
                                     error: function (xhr, ajaxOptions, thrownError) {
                                            toastr.options = {
                                            "closeButton": true,
                                            "debug": false,
                                            "newestOnTop": false,
                                            "progressBar": false,
                                            "positionClass": "toast-top-right",
                                            "preventDuplicates": false,
                                            "onclick": null,
                                            "showDuration": "300",
                                            "hideDuration": "1000",
                                            "timeOut": "5000",
                                            "extendedTimeOut": "1000",
                                            "showEasing": "swing",
                                            "hideEasing": "linear",
                                            "showMethod": "fadeIn",
                                            "hideMethod": "fadeOut"
                                            };

                                            toastr.error("Please Contact Devloper","Failed");
                                            $('#save_count').prop('disabled',false)
                                     }
                                 
                                });
                            })
                        }
                });
            });
        });

    }
	//modal tambah
	function addForm() {
		save_method = "add";

		$('#nama').val(null);
		$('#jk').val(null).trigger('change');
		$('#alamat').val(null);
        $('#jenis').val(null).trigger('change');
        $('#nominal').val(null);
        $('.textbox').closest('div').removeClass('has-success');
	 	$('.textbox').closest('div').removeClass('has-danger');
	 	$('.textbox').parent().find('.text-danger').hide();

		$('input[name=_method]').val("POST");
		$('#reset').show();
		$('#modal-form').modal('show');
		$('.modal-title').text('Tambah Data');
	}
	//modal edit
	function editForm(id) {
		save_method = 'edit';
		hide_all();
		$('input[name=_method').val('PATCH');
		$('#reset').hide();
		$.ajax({
			url: "{{ url('/admin/mal') }}" + '/' + id + "/edit",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('#modal-form').modal('show');
				$('.modal-title').text('Ubah Data');
				$('#id').val(id);
				$('#nama').val(data.nama);
				$('#jk').val(data.jk).trigger('change');
				$('#alamat').val(data.alamat);
				$('#jenis').val(data.jenis).trigger('change');
				$('#nominal').val(data.nominal);
				$('.textbox').closest('div').removeClass('has-success');
			 	$('.textbox').closest('div').removeClass('has-danger');
			 	$('.textbox').parent().find('.text-danger').hide();
			}
		})
	}

	//index
	var table = $('#m-datatable').DataTable({
                language: {
                            url: "{{ asset('datatables/custom.json') }}",
                          },
                processing: true,
                ajax: '{{ url('/admin/api/mal') }}',
                columns: [
                            {
                                data: 'check',
                                name: 'check', 
                                title: '<input type="checkbox" name="checkbox" id="checkall">', 
                                orderable: false,
                                searchable: false
                            },
                            {data: 'nama',name: 'nama' , title: 'Nama'},
                            {data: 'jk',name: 'jk' , title: 'Jenis Kelamin'},
                            {data: 'alamat',name: 'alamat' , title: 'Alamat'},
                            {data: 'jenis',name: 'jenis' , title: 'Zakat'},
                            {data: 'nominal',name: 'nominal' , title: 'Nominal / Jumlah'},
                            {data: 'tanggal',name: 'tanggal' , title: 'Tanggal'},
                            {
                                data: 'action',
                                name: 'action', 
                                title: 'Aksi', 
                                orderable: false,
                                searchable: false
                            },
                        ],
                aaSorting: []

            });
	
	function hide_all(){
        $('#add_on').remove();
    	$('#perhiasan').hide();
        $('#berupa').hide();
        $('#nominal').hide();
        $('#nishab').hide();
        $('#harta').hide();
        $('#lain').hide();
        $('#piutang').hide();
        $('#hutang').hide();
        $('#total').hide();
        $('#confirm').hide();
        $('#panen').hide();
        $('#pengairan').hide();
        $('#hewan').hide();
        $('#temuan').hide();
        $('#f_pengairan').val(null).trigger('change');
        $('#p_berupa').val(null).trigger('change');
        $('#f_nominal').val(null);
        $('#f_lain').val(null);
        $('#f_confirm').val(null);
        $('#f_hutang').val(null);
        $('#f_total').val(null);
        $('#f_nishab').val(null);
        $('#f_perhiasan').val(null);
        $('#f_piutang').val(null);
        $('#f_harta').val(null);
        $('#bentuk').val(null);
 	    $('.textbox').parent().find('.text-danger').hide();
	}
	function nominal(){
		$('#f_nominal').closest('div').removeClass('has-danger');
		$('#f_nominal').closest('div').addClass('has-success');
		$('#f_nominal').removeClass('no-valid');
		$('#f_nominal').parent().find('.text-danger').hide();
	}
	$(document).ready(function(){
        count();
        //cekall
        $('#checkall').change(function() {
            $('.checkitem').prop("checked", $(this).prop("checked"));
        });
        $('.rupiah').number(true,2,',','.');
        $('.number').keypress(function (e) {
             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
        $('.jumlah').keypress(function (e) {
             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $('.text-danger').hide();

        hide_all();
        $('#mal input[class="form-control textbox"] ,#mal textarea').each(function(){ 
            $(this).blur(function(){
                if (! $(this).val()){
                    return get_error_text(this);
                } else {
                    $(this).removeClass('no-valid'); 
                    $(this).parent().find('.text-danger').hide();
                    $(this).closest('div').removeClass('has-danger');
                    $(this).closest('div').addClass('has-success');
                }
            });
        });
        $('#mal select[id="jk"]').each(function(){ 
            $(this).change(function(){ 
                if (! $(this).val()){ 
                    return get_error_text(this); 
                } else {
                    $(this).removeClass('no-valid'); 
                    $(this).parent().find('.text-danger').hide();
                    $(this).closest('div').removeClass('has-danger');
                    $(this).closest('div').addClass('has-success');
                }
            });
        });
       
        $('#jenis').change(function(){
            var jenis = $(this).val();
            var i = $('#f_perhiasan').val();
            if (jenis == "Zakat Emas") {

		        
            	hide_all();
            	$('#perhiasan').show();
            	$('#nominal').show();
            	$('#berupa').show();
            	$('#confirm').show();
            	$('#p_berupa').prop('disabled', true);
            	$('#l_perhiasan').text('Emas yang dimiliki (gram)');
            	$.ajax({
            		type: "POST",
            		url: "{{ url('/admin/mal/calc') }}",
            		data:{
                            '_token': '{{ csrf_token() }}',
                            'jenis' : "Emas",
                         },
                    success: function(data){
                    	$('#f_perhiasan').keyup(function(){
                    		var i = $(this).val();
                    		if (i < 85) {
                    			$('#p_berupa').prop('disabled', true);
                    			$('#p_berupa').val(null).trigger('change');
                    			$('#f_nominal').val(null);
		            			$('#f_confirm').val('TIDAK');
                    		}else if(i >= 85){
                    			$('#f_confirm').val('YA');

                    			$('#p_berupa').prop('disabled', false);
                    			$('#p_berupa').change(function(){
                    				var bayar = $(this).val();
                    				if (bayar == "benda") {
                    					$('#bentuk').val("gram");
                                        $('#add_on').remove();
                                        $('#f_nominal').after('<span class="input-group-addon" id="add_on">gr</span>');
                    					var p = $('#f_perhiasan').val()*0.025;
                    					var h = p;
                    					nominal();
                    					$('#f_nominal').val(h);

                    				}else if(bayar == "uang"){

                    					$('#bentuk').val("rupiah");
                                        $('#add_on').remove();
                                        $('#f_nominal').before('<span class="input-group-addon" id="add_on">Rp.</span>');
                    					var p = $('#f_perhiasan').val() * data.ketetapan * 0.025;
                    					var h = p;
                    					nominal();

                    					$('#f_nominal').val(h);
                    				}else{
                                        $('#add_on').remove();
                                        $('#f_nominal').val(null);
                                    }
                    			});
                    		}
                    		
                    		
                    	});
                    }
            	});
            }else if(jenis=="Zakat Perak"){
		        
            	hide_all();
            	$('#perhiasan').show();
            	$('#nominal').show();
            	$('#berupa').show();
            	$('#confirm').show();
            	$('#p_berupa').prop('disabled', true);
            	
            	$('#l_perhiasan').text('Perak yang dimiliki (gram)');
            	$.ajax({
            		type: "POST",
            		url: "{{ url('/admin/mal/calc') }}",
            		data:{
                            '_token': '{{ csrf_token() }}',
                            'jenis' : "Perak",
                         },
                    success: function(data){
                    	$('#f_perhiasan').keyup(function(){
                    		var i = $(this).val();
                    		if (i < 595) {
                    			$('#p_berupa').prop('disabled', true);
                    			$('#p_berupa').val(null).trigger('change');
                    			$('#f_nominal').val(null);
		            			$('#f_confirm').val('TIDAK');
                    		}else if(i >= 595){
                    			$('#f_confirm').val('YA');
                    			$('#p_berupa').prop('disabled', false);
                    			$('#p_berupa').change(function(){
                    				var bayar = $(this).val();
                    				if (bayar == "benda") {
                    					$('#bentuk').val("gram");
                                        $('#add_on').remove();
                                        $('#f_nominal').after('<span class="input-group-addon" id="add_on">gr</span>');
                    					var p = $('#f_perhiasan').val()*0.025;
                    					var h = p;
                    					nominal();
                    					$('#f_nominal').val(h);

                    				}else if(bayar == "uang"){
                                        $('#bentuk').val("rupiah");
                                        $('#add_on').remove();
                                        $('#f_nominal').before('<span class="input-group-addon" id="add_on">Rp</span>');
                                        var p = $('#f_perhiasan').val() * data.ketetapan * 0.025;
                                        var h = p;
                                        nominal();
                                        $('#f_nominal').val(h);
                                    }else{
                                        $('#add_on').remove();
                                        $('#f_nominal').val(null);
                                    }
                    			});
                    		}
                    		
                    		
                    	});
                    }
            	});
            }else if(jenis == "Zakat Harta"){
		        
            	hide_all();
            	$('#bentuk').val("rupiah");
            	$('#harta').show();
            	$('#lain').show();
            	$('#piutang').show();
            	$('#hutang').show();
            	$('#nishab').show();
            	$('#nominal').show();
            	$('#total').show();
            	$('#confirm').show();
            	$('#perhiasan').hide();
            	$('#f_harta').prop('disabled', true);
            	$('#f_lain').prop('disabled', true);
            	$('#f_piutang').prop('disabled', true);
            	$('#f_hutang').prop('disabled', true);
            	$('#f_nominal').prop('disabled', true);
            	$('#f_total').prop('disabled', true);
            	$('#f_nishab').change(function(){
            		var nishab = $(this).val();
            		if (! $(this).val()) {
            			$('#f_harta').prop('disabled', true);
		            	$('#f_lain').prop('disabled', true);
		            	$('#f_piutang').prop('disabled', true);
		            	$('#f_hutang').prop('disabled', true);
		            	$('#f_nominal').prop('disabled', true);
		            	$('#f_total').prop('disabled', true);
		            	$('#f_total').prop('disabled', true);
            		}else{
            			$.ajax({
		            		type: "POST",
		            		url: "{{ url('/admin/mal/calc') }}",
		            		data:{
		                            '_token': '{{ csrf_token() }}',
		                            'jenis' : nishab,
		                         },
		                    success: function(data){
		                    	$('#f_harta').prop('disabled', false);
		            			$('#f_lain').prop('disabled', false);
		            			$('#f_piutang').prop('disabled', false);
		            			$('#f_hutang').prop('disabled', false);


		            			$('#f_harta').keyup(function(){
		            				if(!$('#f_harta').val()) harta = 0;
		            				else harta = parseInt($('#f_harta').val());

		            				if(!$('#f_lain').val()) lain = 0;
		            				else lain = parseInt($('#f_lain').val());

		            				if(!$('#f_piutang').val()) piutang = 0;
		            				else piutang = parseInt($('#f_piutang').val());

		            				if(!$('#f_hutang').val()) hutang = 0;
		            				else hutang = parseInt($('#f_hutang').val());

		            				var tot = harta + lain + piutang - hutang;
		            				if(data.jenis == "Perak"){
		            					var ket = data.ketetapan * 595;
		            				}else {
		            					var ket = data.ketetapan * 85;
		            				}
		            				
		            				$('#f_total').val(tot);

		            				var zakat = tot * 0.025;

		            				nominal();
                                    $('#add_on').remove();
                                    $('#f_nominal').before('<span class="input-group-addon" id="add_on">Rp.</span>');
		            				$('#f_nominal').val(zakat);
		            				if (tot < ket) {
		            					$('#f_nominal').val(null);
		            					$('#f_confirm').val('TIDAK');
		            				}
		            				if (tot > ket) {
		            					$('#f_confirm').val('YA');

		            				}


                    			});
                    			$('#f_lain').keyup(function(){
		            				if(!$('#f_lain').val()) lain = 0;
		            				else lain = parseInt($('#f_lain').val());

		            				if(!$('#f_piutang').val()) piutang = 0;
		            				else piutang = parseInt($('#f_piutang').val());

		            				if(!$('#f_hutang').val()) hutang = 0;
		            				else hutang = parseInt($('#f_hutang').val());

		            				var tot = harta + lain + piutang - hutang;
		            				if(data.jenis == "Perak"){
		            					var ket = data.ketetapan * 595;
		            				}else {
		            					var ket = data.ketetapan * 85;
		            				}
		            				
		            				$('#f_total').val(tot);

		            				var zakat = tot * 0.025;

		            				nominal();
                                    $('#add_on').remove();
                                    $('#f_nominal').before('<span class="input-group-addon" id="add_on">Rp.</span>');
		            				$('#f_nominal').val(zakat);
		            				if (tot < ket) {
		            					$('#f_nominal').val(null);
		            					$('#f_confirm').val('TIDAK');
		            				}
		            				if (tot > ket) {
		            					$('#f_confirm').val('YA');

		            				}


                    			});
                    			$('#f_piutang').keyup(function(){
		            				if(!$('#f_lain').val()) lain = 0;
		            				else lain = parseInt($('#f_lain').val());

		            				if(!$('#f_piutang').val()) piutang = 0;
		            				else piutang = parseInt($('#f_piutang').val());

		            				if(!$('#f_hutang').val()) hutang = 0;
		            				else hutang = parseInt($('#f_hutang').val());

		            				var tot = harta + lain + piutang - hutang;
		            				if(data.jenis == "Perak"){
		            					var ket = data.ketetapan * 595;
		            				}else {
		            					var ket = data.ketetapan * 85;
		            				}
		            				
		            				$('#f_total').val(tot);

		            				var zakat = tot * 0.025;

		            				nominal();
                                    $('#add_on').remove();
                                    $('#f_nominal').before('<span class="input-group-addon" id="add_on">Rp.</span>');
		            				$('#f_nominal').val(zakat);
		            				if (tot < ket) {
		            					$('#f_nominal').val(null);
		            					$('#f_confirm').val('TIDAK');
		            				}
		            				if (tot > ket) {
		            					$('#f_confirm').val('YA');

		            				}


                    			});
                    			$('#f_hutang').keyup(function(){
		            				if(!$('#f_lain').val()) lain = 0;
		            				else lain = parseInt($('#f_lain').val());

		            				if(!$('#f_piutang').val()) piutang = 0;
		            				else piutang = parseInt($('#f_piutang').val());

		            				if(!$('#f_hutang').val()) hutang = 0;
		            				else hutang = parseInt($('#f_hutang').val());

		            				var tot = harta + lain + piutang - hutang;
		            				if(data.jenis == "Perak"){
		            					var ket = data.ketetapan * 595;
		            				}else {
		            					var ket = data.ketetapan * 85;
		            				}
		            				
		            				$('#f_total').val(tot);

		            				var zakat = tot * 0.025;

		            				nominal();
                                    $('#add_on').remove();
                                    $('#f_nominal').before('<span class="input-group-addon" id="add_on">Rp.</span>');
		            				$('#f_nominal').val(zakat);
		            				if (tot < ket) {
		            					$('#f_nominal').val(null);
		            					$('#f_confirm').val('TIDAK');
		            				}
		            				if (tot > ket) {
		            					$('#f_confirm').val('YA');

		            				}


                    			});

		                    }
		            	});
            		}
            	});
            }else if (jenis == "Zakat Pertanian") {
            	hide_all();
            	$('#panen').show();
            	$('#pengairan').show();
            	$('#nominal').show();
            	$('#confirm').show();
            	$('#f_pengairan').prop('disabled', true);

            	$('#f_panen').keyup(function(){
            		if($(this).val() < 750){
            		$('#f_pengairan').prop('disabled', true);
            		$('#f_nominal').val(null);
		            $('#f_confirm').val('TIDAK');
	            	}else{
	            		$('#f_pengairan').prop('disabled', false);
	            		$('#f_confirm').val('YA');
	            		$('#f_pengairan').change(function(){
			            		if($(this).val() == "biaya"){
			            			$('#bentuk').val("kilogram");
			            			var panen = parseInt($('#f_panen').val());
				            		var hasil = panen * 0.05;
				            		nominal();
                                    $('#add_on').remove();
                                    $('#f_nominal').after('<span class="input-group-addon" id="add_on">Kg</span>');
				            		$('#f_nominal').val(hasil);
				            	}else{
				            		$('#bentuk').val("kilogram");
				            		var panen = parseInt($('#f_panen').val());
				            		var hasil = panen * 0.10;
				            		nominal();
                                    $('#add_on').remove();
                                    $('#f_nominal').after('<span class="input-group-addon" id="add_on">Kg</span>');
				            		$('#f_nominal').val(hasil);
				            	}
			            });

	            	}
	            });
            	


            }else if (jenis == "hewan") {
            	hide_all();
            	$('#hewan').show();
            	$('#nominal').show();
            	$('#confirm').show();

            	$('#f_hewan').keyup(function(){
            		if($(this).val() < 40){
            			$('#f_nominal').val(null);
            			$('#f_confirm').val('TIDAK');
            		}else {
            			$('#f_confirm').val('YA');
            			var hasil = parseInt($(this).val()) * 0.025;

            			$('#f_nominal').val(hasil);
            		}
            	});

            }else if (jenis == "Zakat Harta Temuan") {
            	hide_all();
            	$('#temuan').show();
            	$('#nominal').show();
            	$('#f_temuan').keyup(function(){
            		if(! $(this).val()){
            			$('#f_nominal').val(null);
            		}
            		$('#bentuk').val("rupiah");
            		var hasil = parseInt($(this).val()) * 0.20;
            		nominal();
                    $('#add_on').remove();
                    $('#f_nominal').before('<span class="input-group-addon" id="add_on">Rp.</span>');
            		$('#f_nominal').val(hasil);
            	});
            }else{
            		hide_all();
            }

 
        });

         $('#reset').on('click', function(){
         	 $('#jk').val(null).trigger('change');
         	 $('#jenis').val(null).trigger('change');
         	 $('.textbox').closest('div').removeClass('has-success');
         	 $('.textbox').closest('div').removeClass('has-danger');
         	 $('.textbox').parent().find('.text-danger').hide();
         });

         $('#mal').submit(function(e){
            e.preventDefault();
            //url
            var id = $('#id').val();
            if (save_method == 'add') url = "{{ route('mal.store') }}";
            else url = "{{ url('/admin/mal/'). '/'}}" + id;

            if (save_method == 'add') pesan = "Menambah Data Zakat Mal";
            else pesan = "Mengubah Data Zakat Mal";

             if (save_method == 'add') method = "POST";
            else method = "PATCH";

            var valid=true;     
            $(this).find('.textbox').each(function(){
                if (! $(this).val()){
                    get_error_text(this);
                    valid = false;
                    $('html,body').animate({scrollTop: 0},"slow");
                } 
                if ($(this).hasClass('no-valid')){
                    valid = false;
                    $('html,body').animate({scrollTop: 0},"slow");
                }
            });
            if (valid){
            			var nama = $('#nama').val();
            			var jk = $('#jk').val();
            			var alamat = $('#alamat').val();
            			var jenis = $('#jenis').val();
            			var bentuk = $('#bentuk').val();
            			var nominal = $('#f_nominal').val();
            			var method = $('input[name=_method').attr('value');
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                            		_method: method,
                            		_token: '{{ csrf_token() }}',
                            		nama : nama,
                            		jk : jk,
                            		alamat : alamat,
                            		jenis : jenis,
                            		bentuk : bentuk,
                            		nominal : nominal,
                           		  }, 
                            dataType: "html",
                            success: function(){                
                            toastr.options = {
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": false,
								"positionClass": "toast-top-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
								};

							toastr.success(pesan, "Berhasil");

	                        $('#modal-form').modal('hide');
	                        $('#nama').val(null);
	                        $('#alamat').val(null);
	                        $('#jk').val(null).trigger('change');
	                        $('#jenis').val(null).trigger('change');
	                        $('.textbox').closest('div').removeClass('has-success');
	                        $('.textbox').closest('div').removeClass('has-danger');
	                        $('.textbox').parent().find('.text-danger').hide();
	                        table.ajax.reload();
                            mApp.block('#count', {});

                            setTimeout(function() {
                                mApp.unblock('#count');
                            }, 1000);
                            
                            count();
                            },	
                            
                            error: function (xhr, ajaxOptions, thrownError) {
                            	toastr.options = {
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": false,
								"positionClass": "toast-top-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
								};

							toastr.error("Please Contact Devloper", "Failed");
                            mApp.block('#count', {
                                type: 'loader',
                                state: 'success',
                                message: 'Processing..'
                            });

                            setTimeout(function() {
                                mApp.unblock('#count');
                            }, 1000);
                            count();
                            }
                });
            }
        });
    });
  
    function apply_feedback_error(textbox){
        $(textbox).addClass('no-valid'); 
        $(textbox).parent().find('.text-danger').show();
        $(textbox).closest('div').removeClass('has-success');
        $(textbox).closest('div').addClass('has-danger');
    }


    function get_error_text(textbox){
        $(textbox).parent().find('.text-danger').text("Kolom tidak boleh kosong.");
        return apply_feedback_error(textbox);
    }


	//delete
	$('#delsel').click(function(){
	  var id = [];
	  $('.checkitem:checkbox:checked').each(function(i){
		    id[i] = $(this).val();
		   });
	  if(id.length === 0) 
	   {
	    swal({
			  title: 'Oops..',
			  text: "Silahkan Pilih Salah Satu!",
  			  type: 'error',
			  animation: false,
			  customClass: 'animated tada'
			})
	   }else{

	   		swal({
				  title: 'Apakah Kamu Yakin?',
				  text: "Akan Menghapus Data!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  cancelButtonTidak: 'Batal',
				  confirmButtonText: 'Yakin',
				  animation: false,
				  customClass: 'animated fadeinDown'
				}).then(function () {
				  $.ajax({
					     url:'{{ url('admin/mal/delsel') }}',
					     method:'POST',
					     data:{
					     		'_token': '{{ csrf_token() }}',
					     		'id':id
					     	  },
					     success:function()
					     {
					       toastr.options = {
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": false,
								"positionClass": "toast-top-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
								};

							toastr.success("Menghapus " + id.length + " Data","Berhasil");
							$('.checkitem').prop('checked', false);
							$('#checkall').prop('checked', false);
				            table.ajax.reload();
                            mApp.block('#count', {
                                type: 'loader',
                                state: 'success',
                                message: 'Processing..'
                            });

                            setTimeout(function() {
                                mApp.unblock('#count');
                            }, 1000);
                            count();
			        }
				     
				    });
				})
		    
	   
	 }
	  
	  

	 });

</script>
@endpush

