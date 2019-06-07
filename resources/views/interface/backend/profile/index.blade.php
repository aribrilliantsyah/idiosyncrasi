@extends('layouts.admin')
@section('title')
Profile
@endsection

@push('plugin-styles')
<link href="{{ asset('/js/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div class="row">
	<div class="col-sm-6">
		<div class="m-portlet m-portlet--full-height  ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Profile Pengguna
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="m-card-profile">
					<div class="m-card-profile__pic">
						<div class="m-card-profile__pic-wrapper">
							<img src="{{ asset('/img/foto/'.Auth::user()->foto) }}" alt=""/>
						</div>
					</div>
					<div class="m-card-profile__details">
						<span class="m-card-profile__name">
							{{ Auth::user()->name }}
						</span>
							{{ Auth::user()->email }}
						<span class="m-card-profile__name">
							<button type="button" class="btn btn-accent m-btn m-btn--air btn-sm" data-toggle="modal" data-target="#m_modal_1">
								<i class="fa fa-lock"></i> Ubah Password 
							</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
						  Ubah Profile
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form class="m-form m-form--fit m-form--label-align-right" id="profile">
				{{ csrf_field() }}
				<input type="hidden" name="id" {{ Auth::user()->id }}>
				<div class="m-portlet__body">
					<div class="form-group m-form__group">
						<label for="">
							Nama
						</label>
						<input type="text" name="name" class="form-control m-input m-input--circle textbox" id="nama" placeholder="Name" value="{{ Auth::user()->name }}" required="">
						<span class="text-danger" ></span>
					</div>
					<div class="form-group m-form__group">
						<label for="">
							Alamat Email
						</label>
						<input type="email" name="email" class="form-control m-input m-input--circle textbox" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ Auth::user()->email }}">
						<span class="text-danger" ></span>
					</div>
					<div class="form-group m-form__group">
						<label for="">
							Deskripsi
						</label>
						<textarea name="description" class="form-control m-input m-input--circle" id="textarea"  placeholder="Optional" value="{{ Auth::user()->description }}">{{ Auth::user()->description }}</textarea>
					</div>
					<div class="form-group m-form__group">
						<label>
							Foto Profil
						</label>
						<div></div>
						<label class="custom-file">
							<input type="file" class="custom-file-input" name="foto" id="foto">
							<span class="custom-file-control"></span>
						</label>
						<br>
						<span id="alert" class="text-danger"></span>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="submit" class="btn btn-accent m-btn m-btn--air btn-sm" id="submit">
							<i id="icon" class="fa fa-save"></i>  Simpan
						</button>
						<button type="reset" class="btn btn-secondary m-btn m-btn--air btn-sm" id="reset_profile">
							<i class="fa fa-refresh"></i>  Reset
						</button>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
	</div>
</div>


{{-- Modal --}}
<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					<i class="fa fa-lock"></i>
					Ubah Password
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						×
					</span>
				</button>
			</div>
			<div class="modal-body">
			<form class="m-form m-form--fit m-form--label-align-right" id="change">
				{{ csrf_field() }}
				<input type="hidden" name="id" {{ Auth::user()->id }}>
				<div class="m-portlet__body">
					<div class="form-group m-form__group">
						<label for="">
							Password Lama
						</label>
						<input type="password" name="password" class="form-control m-input m-input--circle textbox" id="old" placeholder="Password Lama">
						<span class="text-danger" ></span>
					</div>
					<div class="form-group m-form__group">
						<label for="">
							Password Baru
						</label>
						<input type="password" name="new" class="form-control m-input m-input--circle textbox" id="new"  placeholder="Password Baru">
 						 <span class="text-danger" ></span>
					</div>
					<div class="form-group m-form__group">
						<label for="">
							Ulangi Password
						</label>
						<input type="password" name="repeat" class="form-control m-input m-input--circle textbox" id="repeat"  placeholder="Ulangi Password">
						 <span class="text-danger" ></span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-accent m-btn m-btn--air btn-sm">
					<i class="fa fa-save"></i>  Simpan
				</button>
				<button type="reset" id="reset" class="btn btn-secondary m-btn m-btn--air btn-sm">
					<i class="fa fa-refresh"></i>  Reset
				</button>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection
@push('plugin-scripts')
{{-- chage password --}}
<script type="text/javascript">
	$(document).ready(function(){
        //semua element dengan class text-danger akan di sembunyikan saat load
        $('.text-danger').hide();
        //untuk mengecek bahwa semua textbox tidak boleh kosong
        $('#change input').each(function(){ 
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

        //old_password
        $('#old').blur(function(){
			var password= $(this).val();
            var len= password.length;
            if (len == 0){
            	$(this).parent().find('.text-danger').text("Kolom tidak boleh kosong.");
                return apply_feedback_error(this);
            }
			if (len>0 && len<3) {
                $(this).parent().find('.text-danger').text("password minimal 3 karakter");
                return apply_feedback_error(this);
	            } else {
					if(len>35) {
	                    $(this).parent().find('.text-danger').text("password maksimal 35 karakter");
	                    return apply_feedback_error(this);
	                } else {
                        $.ajax({
                           url: "{{ url('/validasi/old') }}",
                           type: "POST",
                           data: {
					                '_token': '{{ csrf_token() }}',
					                'password': password,
					             },
                           dataType: "text",
                           success: function(data){
                                     if (data == 0){
						                             $('#old').parent().find('.text-danger').text("Password tidak cocok dengan data Kami");
						                             return apply_feedback_error('#old');
                                                    }
                                                   }
                 	        });
						}
				} 
		});
	
        //mengecek password
        $('#new').blur(function(){ 
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
            var pass = $("#new").val();
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
         $('#change').submit(function(e){
            e.preventDefault();
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
                            url: "{{ route('setting.password') }}",
                            type: "POST",
                            data: $('#change').serialize(), //serialize() untuk mengambil semua data di dalam form
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

							toastr.success("Mengganti Password.","Berhasil");
	                        $('#m_modal_1').modal('hide');
	                        $('#old').val(null);
	                        $('#new').val(null);
	                        $('#repeat').val(null);
	                        $('.textbox').closest('div').removeClass('has-success');
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

							toastr.error("Failed", "Please Contact Devloper.");
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


</script>

{{-- change profile --}}
<script type="text/javascript">
	$(document).ready(function(){
        //semua element dengan class text-danger akan di sembunyikan saat load
        $('.text-danger').hide();
        //untuk mengecek bahwa semua textbox tidak boleh kosong
        $('#profile input[type="text"], #profile input[type="email"]').each(function(){ 
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
        //email
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
	                           if (data==1){ //pada file check email.php, apabila email sudah ada di database makan akan mengembalikan nilai 0
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
		$('#foto').change(function(){
		            var image= $(this).val();
		            var len= image.length;
		            if(len>0){ 
		                    var form_data = new FormData($('#profile')[0]);
		                    var valid = false;
		                    $.ajax({
		                             url: "{{ url('/validasi/image') }}",
		                             type: "POST",
		                             processData: false,
		                             contentType: false,
		                             async: false,
		                             cache: false,
		                             data : form_data,
		                             success: function(data){
		                                       if (data==1){ 
		                                       	  $('#alert').show().text("File harus gambar (png,jpg,jpeg,bmp,img,dll)");
		                                       	  $('#foto').closest('div').removeClass('has-success');
		                                       	  $('#foto').closest('div').addClass('has-danger');
		                                       	  $('#foto').addClass('no-valid');
		                                      }else {
		                                      	  $('#foto').closest('div').removeClass('has-danger');
		                                      	  $('#foto').closest('div').addClass('has-success');
		                                      	  $('#foto').removeClass('no-valid');
		                                          $('#alert').hide();
		                                      }
		                                  }
		                        });
		                
		            } 
		        });
         $('#reset_profile').on('click', function(){
         	 $('#alert').hide();
             $('#submit').prop('disabled', false);
             $('#foto').closest('div').removeClass('has-danger');
             $('#foto').closest('div').removeClass('has-success');
         	 $('.textbox').closest('div').removeClass('has-success');
         	 $('.textbox').closest('div').removeClass('has-danger');
         	 $('.textbox').parent().find('.text-danger').hide();
         });
         $('#profile').submit(function(e){
            e.preventDefault();
            var valid=true;

            $(this).find('.textbox').each(function(){
                if (! $(this).val()){
                    get_error_text(this);
                    valid = false;

                } 
                if ($(this).hasClass('no-valid')){
                    valid = false;
                   
                }
            });

            if ($('#foto').hasClass('no-valid')){
            	valid = false;
            }
            if (valid){
            	        $('#icon').removeClass('fa fa-save');
                        $('#icon').addClass('fa fa-circle-o-notch fa-spin');
            			$('#submit').prop('disabled', true);
                        $('#reset').prop('disabled', true);
            			var form_data = new FormData($('#profile')[0]);
            			$.ajax({ 
                                  url: "{{ url('/admin/profile/update') }}", 
                                  type: "POST", 
                                  processData: false,
                                  contentType: false,
                                  async: false,
                                  cache: false,
                                  data : form_data,
                                  success: function(){                 
                                       window.location = ('{{ url('/to_profile') }}')
                                      
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

                                            toastr.error("Please Contact Devloper", "Oops..!");
                                            $('#submit').prop('disabled', false);
                                            $('#reset').prop('disabled', false);
                                            $('#icon').addClass('fa fa-save');
                      						$('#icon').removeClass('fa fa-circle-o-notch fa-spin');
                                            
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
</script>
@endpush
