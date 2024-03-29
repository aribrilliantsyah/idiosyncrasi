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
Infaq & Sodaqoh
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
					Infaq Dan Sodaqoh
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
				<div class="row">
					<div class="col-sm-6">
						<h6>Infaq</h6>
						<table class="table" style="font-size: 13px" id="infaq">
							
						</table>
					</div>
					<div class="col-sm-6">
						<h6>Sodaqoh</h6>
						<table class="table" style="font-size: 13px" id="sodaqoh">
						</table>
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
				<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
					<div class="row align-items-center">
						<div class="col-xl-8 order-2 order-xl-1">
{{--  --}}
						</div>
						<div class="col-xl-4 order-1 order-xl-2 m--align-right">
							<button class="btn btn-sm btn-outline-danger m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air" id="delsel"><i class="fa fa-trash"></i> Hapus data </button>
							<button onclick="addForm()" class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air"><i class="fa fa-plus"></i> Tambah Data </button>
						</div>
					</div>
				</div>
				<!--begin: Datatable -->

					<table id="m-datatable" class="table table-striped table-hover table-hover">
	
					</table>


				<!--end: Datatable -->
			</div>
		</div>
	</div>
</div>
@include('interface.backend.pendataan.amal.form')
@endsection
@push('plugin-scripts')
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script type="text/javascript">
		//count
	function count() {
		$.get('/admin/count/amal',function(data){
			var infaq = '<tr>'+
							'<td>Jumlah Donatur</td>'+
							'<td>'+ data.Infaq.Donatur +'</td>'+
					    '<tr>'+
					    '<tr>'+
							'<td>Total Perolehan</td>'+
							'<td>'+ data.Infaq.Total +'</td>'+
					    '<tr>';
			var sodaqoh = '<tr>'+
							'<td>Jumlah Donatur</td>'+
							'<td>'+ data.Sodaqoh.Donatur +'</td>'+
					    '<tr>'+
					    '<tr>'+
							'<td>Total Perolehan</td>'+
							'<td>'+data.Sodaqoh.Total+'</td>'+
					    '<tr>';
			$('#infaq').html(infaq);
			$('#sodaqoh').html(sodaqoh);
			$('#tools').html('<button class="btn btn-sm btn-success m-btn m-btn--icon m-btn--pill m-btn--air" id="save_count"><i class="fa fa-save"></i> Simpan Hasil</button>');
			// //save_count
			var ket = data;
			$('#save_count').click(function(){
				var today = new Date();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
				var d = yyyy+''+00+mm;
					$.get('/admin/count/cek/amal/'+ d ,function(data){
						if(data.count == 0){
							$('#save_count').prop('disabled',true);
							$.ajax({
								     url:'{{ url('/admin/save/count/amal') }}',
								     method:'POST',
								     data:{
								     		'_token': '{{ csrf_token() }}',
								     		'ket' : ket,
								     		'kode' : d,
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
								     url:'{{ url('/admin/save/count/amal') }}',
								     method:'POST',
								     data:{
								     		'_token': '{{ csrf_token() }}',
								     		'ket' : ket,
								     		'kode' : d,
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
		$('input[name=_method').val('PATCH');
		$('#reset').hide();
		$.ajax({
			url: "{{ url('/admin/amal') }}" + '/' + id + "/edit",
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
                ajax: '{{ url('/admin/api/amal') }}',
                columns: [
							{
								data: 'check',
							    name: 'check', 
							    title: '<input type="checkbox" name="checkbox" id="checkall">', 
							    orderable: false,
							    searchable: false
							},
							{ data: 'nama',name: 'nama' , title: 'Nama'},
							{ data: 'jk',name: 'jk' , title: 'Jenis Kelamin'},
							{ data: 'alamat',name: 'alamat' , title: 'Alamat'},
							{ data: 'jenis',name: 'jenis' , title: 'Jenis', searchable:true,},
							{ data: 'nominal',name: 'nominal' , title: 'Nominal', searchable:true,},
							{ data: 'tanggal',name: 'tanggal' , title: 'Tanggal'},
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
	
	//validasi
	$(document).ready(function(){
		$('.rupiah').number(true,2,',','.');
		count();
		//cekall
		$('#checkall').change(function() {
			$('.checkitem').prop("checked", $(this).prop("checked"))
		});
        //semua element dengan class text-danger akan di sembunyikan saat load
        $('.text-danger').hide();
        //untuk mengecek bahwa semua textbox tidak boleh kosong
        $('#amal input ,#amal textarea').each(function(){ 
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
        $('#amal select').each(function(){ 
            $(this).change(function(){ 
                if (! $(this).val()){ 
                    return get_error_text(this); 
                } else {
                    $(this).removeClass('no-valid'); 
                    $(this).parent().find('.text-danger').hide();
                    $(this).closest('div').addClass('has-success');
                }
            });
        });
       

         $('#reset').on('click', function(){
         	 $('#jk').val(null).trigger('change');
         	 $('#jenis').val(null).trigger('change');
         	 $('.textbox').closest('div').removeClass('has-success');
         	 $('.textbox').closest('div').removeClass('has-danger');
         	 $('.textbox').parent().find('.text-danger').hide();
         });

         $('#amal').submit(function(e){
            e.preventDefault();
            //url
            var id = $('#id').val();
            var jenis = $('#jenis').val();
            if (save_method == 'add') url = "{{ route('amal.store') }}";
            else url = "{{ url('/admin/amal/'). '/'}}" + id;

            if (save_method == 'add') pesan = "Menambah Data " + jenis;
            else pesan = "Mengubah Data "  + jenis;

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
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: $('#amal').serialize(), 
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

							toastr.success(pesan ,"Berhasil");

	                        $('#modal-form').modal('hide');
	                        $('#nama').val(null);
	                        $('#alamat').val(null);
	                        $('#jk').val(null).trigger('change');
	                        $('#jenis').val(null).trigger('change');
	                        $('#nominal').val(null);
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

							toastr.error("Please Contact Devloper" , "Failed");
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
	  if(id.length === 0) //tell you if the array is empty
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
				  cancelButtonText: 'Batal',
				  confirmButtonText: 'Yakin',
				  animation: false,
				  customClass: 'animated fadeinDown'
				}).then(function () {
				  $.ajax({
					     url:'{{ url('admin/amal/delsel') }}',
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

							toastr.success("Menghapus " + id.length + " Data", "Berhasil");
							$('.checkitem').prop('checked', false);
							$('#checkall').prop('checked', false);
				            table.ajax.reload();
			        }
				     
				    });
				})
		    
	   
	 }
	  
	  

	 });

</script>
@endpush

