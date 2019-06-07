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
MASTER
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
					Master
				</span>
			</a>
		</li>
		<li class="m-nav__separator">
			-
		</li>
		<li class="m-nav__item">
			<a class="m-nav__link">
				<span class="m-nav__link-text">
					Ketetapan - Zakat
				</span>
			</a>
		</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__body">
				<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
					<div class="row align-items-center">
						<div class="col-xl-8 order-2 order-xl-1">
							<h3 class="m-portlet__head-text">
								Daftar 
							</h3>
						</div>
						<div class="col-xl-4 order-1 order-xl-2 m--align-right">
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
@include('interface.backend.m_ketetapan.form')
@endsection
@push('plugin-scripts')
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.js"></script>
<script type="text/javascript">
	//modal edit
	function editForm(id) {
		$.ajax({
			url: "{{ url('/admin/ketetapan') }}" + '/' + id,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('#modal-form').modal('show');
				$('.modal-title').text('Ubah Data');
				$('#id').val(data.id);
				$('#jenis').val(data.jenis);
				$('#ketetapan').val(data.ketetapan);
				$('.textbox').closest('div').removeClass('has-success');
			 	$('.textbox').closest('div').removeClass('has-danger');
			 	$('.textbox').parent().find('.text-danger').hide();
			}
		})
	}

	//index
	var table = $('#m-datatable').DataTable({
					responsive: true,
					processing: true,
					language: {
                            url: "{{ asset('datatables/custom.json') }}",
                          },
					severSide: true,
					ajax: "{{ url('/admin/api/ketetapan') }}",
					columns:[
						{data: 'jenis',name: 'jenis' , title: 'Jenis'},
						{data: 'ketetapan',name: 'ketetapan' , title: 'Ketetapan'},
						{
							data: 'action',
						 	name: 'action', 
						 	title: 'Aksi', 
						 	orderable: false,
						 	searchable: false
						},
					],
				});
	
	//validasi
	$(document).ready(function(){

        //semua element dengan class text-danger akan di sembunyikan saat load
        $('.text-danger').hide();
        //untuk mengecek bahwa semua textbox tidak boleh kosong
        $('#f_ketetapan input').each(function(){ 
            $(this).blur(function(){ //blur function itu dijalankan saat element kehilangan fokus
                if (! $(this).val()){ //this mengacu pada text box yang sedang fokus
                    return get_error_text(this); //function get_error_text ada di bawah
                } else {
                    $(this).removeClass('no-valid'); 
                    $(this).parent().find('.text-danger').hide();//cari element dengan class has-danger dari element induk text yang sedang focus
                    $(this).closest('div').removeClass('has-danger');
                    $(this).closest('div').addClass('has-success');
                }
            });
        });

        $('#ketetapan').blur(function(){
        	var jenis = $('#jenis').val();
			var ketetapan= $(this).val();
            var len= ketetapan.length;

            if (jenis == "Beras") {
            	if(len > 4){
            		$(this).parent().find('.text-danger').text("Isian tidak sesuai ketentuan.");
                	return apply_feedback_error(this);
            	}
            }else if (jenis == "Uang") {
            	if(len > 11){
            		$(this).parent().find('.text-danger').text("Isian tidak sesuai ketentuan.");
                	return apply_feedback_error(this);
            	}
            }else if (jenis == "Emas") {
            	if(len > 11){
            		$(this).parent().find('.text-danger').text("Isian tidak sesuai ketentuan.");
                	return apply_feedback_error(this);
            	}
            }
		});
         $('#f_ketetapan').submit(function(e){
            e.preventDefault();
            //url
            var id = $('#id').val();
            var jenis = $('#jenis').val();
            var url = "{{ url('/admin/ketetapan/'). '/'}}" + id ;

            var pesan = "Mengubah Ketetapan "  + jenis;

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
                            url: "{{ url('/admin/ketetapan/')}}",
                            type: "POST",
                            data: $('#f_ketetapan').serialize(), //serialize() untuk mengambil semua data di dalam form
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
	                        $('#jenis').val(null);
	                        $('#ketetapan').val(null);
	                        $('.textbox').closest('div').removeClass('has-success');
	                        $('.textbox').closest('div').removeClass('has-danger');
	                        $('.textbox').parent().find('.text-danger').hide();
	                        table.ajax.reload();
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
    //menerapkan gaya validasi form bootstrap saat terjadi eror
    function apply_feedback_error(textbox){
        $(textbox).addClass('no-valid'); //menambah class no valid
        $(textbox).parent().find('.text-danger').show();
        $(textbox).closest('div').removeClass('has-success');
        $(textbox).closest('div').addClass('has-danger');
    }

    //untuk mendapat eror teks saat textbox kosong, digunakan saat submit form dan blur fungsi
    function get_error_text(textbox){
        $(textbox).parent().find('.text-danger').text("Kolom tidak boleh kosong.");
        return apply_feedback_error(textbox);
    }

</script>
@endpush



