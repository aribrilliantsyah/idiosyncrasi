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
Management User
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
								User 
							</h3>
						</div>
						<div class="col-xl-4 order-1 order-xl-2 m--align-right">
							<button class="btn btn-xs btn-danger m-btn--air m-btn--pill " id="delsel"><i class="fa fa-trash"></i> Hapus data </button>
							<button onclick="addForm()" class="btn btn-xs btn-accent m-btn--air m-btn--pill "><i class="fa fa-plus"></i> Tambah Data </button>
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
@include('interface.backend.user.form')
@endsection
@push('plugin-scripts')
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.js"></script>
<script type="text/javascript">
	//modal tambah
	function addForm() {
		save_method = "add";

		$('#name').val(null);
		$('#email').val(null);
		$('#password').val(null);
		$('#repeat').val(null);
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
			url: "{{ url('/su/user') }}" + '/' + id + "/edit",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('#modal-form').modal('show');
				$('.modal-title').text('Ubah Data');
				$('#id').val(id);
				$('#name').val(data.name);
				$('#email').val(data.email);
				$('#password').val(null);
				$('#repeat').val(null);
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
					responsive: true,
					processing: true,
					ajax: "{{ url('/su/api/user') }}",
					columns:[
						{
							data: 'check',
						    name: 'check', 
						    title: '<input type="checkbox" name="checkbox" id="checkall">', 
						    orderable: false,
						    searchable: false
						},
						{data: 'name',name: 'name' , title: 'nama'},
						{data: 'email',name: 'email' , title: 'Email'},
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
		//cekall
		$('#checkall').change(function() {
			$('.checkitem').prop("checked", $(this).prop("checked"));
		});
        //semua element dengan class text-danger akan di sembunyikan saat load
        $('.text-danger').hide();
        //untuk mengecek bahwa semua textbox tidak boleh kosong
        $('#user input').each(function(){ 
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

        //validasi
        $('#email').blur(function(){
          var email= $(this).val();
          var len= email.length;
          if(len>0){ 
            if(!valid_email(email)){ 
              $(this).parent().find('.text-danger').text("");
              $(this).parent().find('.text-danger').text("Email tidak valid (ex: sample@domain.com)"); 
              return apply_feedback_error(this);
            } else {
              if (len>38){ 
                $(this).parent().find('.text-danger').text("");
                $(this).parent().find('.text-danger').text("Maksimal 38 karakter");
                return apply_feedback_error(this);
              } else {
                var valid = false;
                $.ajax({
	                   url: "{{ url('/validasi/email') }}",
	                   type: "POST",
	                   data: {
	                          '_token': '{{ csrf_token() }}',
	                          'email': email,
	                         },
	                   dataType: "text",
	                   success: function(data){
	                           if (data==1){
	                               $('#email').parent().find('.text-danger').text("");
	                               $('#email').parent().find('.text-danger').text("Email yang Anda masukan telah digunakan"); 
	                               return apply_feedback_error('#email');
	                           }
	                        }
                  });
                }
            }

          } 
        });

        //mengecek password
        $('#password').blur(function(){ 
            var password=$(this).val();
            var len=password.length;
            if (len>0 && len<3) {
                $(this).parent().find('.text-danger').text("password minimal 3 karakter.");
                return apply_feedback_error(this);
            } else {
                if(len>35) {
                    $(this).parent().find('.text-danger').text("password maksimal 35 karakter.");
                    return apply_feedback_error(this);
                }
            }
        });
        //mengecek konfirmasi password
        $('#repeat').blur(function(){
            var pass = $("#password").val();
            var conf=$(this).val();
            var len=conf.length;
            if (len>0 && pass!==conf) {
                $(this).parent().find('.text-danger').text("konfirmasi password tidak cocok.");
                return apply_feedback_error(this);
            }
        });
         $('#reset').on('click', function(){
         	 $('.textbox').closest('div').removeClass('has-success');
         	 $('.textbox').closest('div').removeClass('has-danger');
         	 $('.textbox').parent().find('.text-danger').hide();
         });

         $('#user').submit(function(e){
            e.preventDefault();
            //url
            var id = $('#id').val();
            if (save_method == 'add') url = "{{ url('/su/user/') }}";
            else url = "{{ url('/su/user/'). '/'}}" + id;

            if (save_method == 'add') pesan = "Menambah User";
            else pesan = "Mengubah User";

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
                            data: $('#user').serialize(), //serialize() untuk mengambil semua data di dalam form
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

							toastr.success(pesan , "Berhasil");

	                        $('#modal-form').modal('hide');
	                        $('#nama').val(null);
	                        $('#alamat').val(null);
	                        $('#jk').val(null).trigger('change');
	                        $('#jenis').val(null).trigger('change');
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

							toastr.error("Please Contact Devloper","Failed");
                            }
                });
            }
        });
    });
	function valid_email(email){
		var pola= new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
		return pola.test(email);
	}
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
					     url:'{{ url('su/user/delsel') }}',
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
			        }
				     
				    });
				})
		    
	   
	 }
	  
	  

	 });

</script>
@endpush



