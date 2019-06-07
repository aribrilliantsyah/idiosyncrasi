@extends('layouts.admin')
@push('plugin-styles')
<link href="{{ asset('/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">
.container{
    margin-top:20px;
}
.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
</style>
<style>
  #map-canvas{
    width: 100%;
    height: 400px;
  }
</style>
@endpush
@section('title')
BLOG 
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
					Blog
				</span>
			</a>
		</li>
		<li class="m-nav__separator">
			-
		</li>
		<li class="m-nav__item">
			<a class="m-nav__link">
				<span class="m-nav__link-text">
					Konten
				</span>
			</a>
		</li>
	</ul>
@endsection
@section('content')
@php
function data_c($type){
	return App\content::where('jenis', $type)->first()->ket;
}
@endphp
<div class="row">
	<div class="col-sm-12">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Tentang
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<button onclick="save('tentang')" class="btn btn-sm btn-accent m-btn--air m-btn--pill "><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>
			<div class="m-portlet__body">
				<textarea class="form-control editor" name="visi" id="c_tentang">{{ data_c('tentang') }}</textarea>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							VISI & MISI
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="row">
					<div class="col-sm-6">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											VISI
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<button onclick="save('visi')" class="btn btn-sm btn-accent m-btn--air m-btn--pill "><i class="fa fa-save"></i> Simpan</button>
								</div>
							</div>
							<div class="m-portlet__body">
								<textarea class="form-control editor" name="visi" id="c_visi">{{ data_c('visi') }}</textarea>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											MISI
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<button onclick="save('misi')"" class="btn btn-sm btn-accent m-btn--air m-btn--pill "><i class="fa fa-save"></i> Simpan</button>
								</div>
							</div>
							<div class="m-portlet__body">
								<textarea class="form-control editor" name="misi" id="c_misi">{{ data_c('misi') }}</textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							QUOTES
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<button onclick="save('quotes')" class="btn btn-sm btn-accent m-btn--air m-btn--pill "><i class="fa fa-save"></i> Simpan</button>
		 		</div>
			</div>
			<div class="m-portlet__body">
				<textarea class="form-control" name="quotes" id="c_quotes" rows="10">{{ data_c('quotes') }}</textarea>
			</div>
		</div>
	</div>
	<div class="col-sm-6">	
		<div class="m-portlet m-portlet--full-height ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Kontak
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<button class="btn btn-sm btn-accent m-btn m-btn--icon m-btn--pill m-btn--air" onclick="save_kontak('kontak')"><i class="fa fa-save"></i> Simpan </button>
				</div>
			</div>
			<div class="m-portlet__body">
				<form class="form" id="kontak" role="form">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone"></i></span>
							<input type="text" name="phone" class="form-control textbox" value="{{ data_c('phone') }}" id="phone">
						</div>
						<span class="text-danger" id="error-phone"></span>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-map"></i></span>
							<input type="text" name="lokasi" class="form-control textbox" value="{{ data_c('lokasi') }}" id="lokasi">
						</div>
						<span class="text-danger" id="error-lokasi"></span>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-inbox"></i></span>
							<input type="text" name="email" class="form-control textbox" value="{{ data_c('email') }}" id="email">
						</div>
						<span class="text-danger" id="error-email"></span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							PETA
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<button onclick="save_map('map')" class="btn btn-sm btn-accent m-btn--air m-btn--pill "><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>
			<div class="m-portlet__body">
				<form id="map" role="form">
					<div class="form-group">
						<label for="">Alamat</label>
	                	<input type="text" class="form-control textbox" name="searchmap" id="searchmap" value="{{ data_c('lokasi') }}">
	                	<span class="text-danger" id="error-searchmap"></span>
					</div>
					<div id="map-canvas"></div>
					<div class="row">
						<div class="form-group col-sm-6">
			              <label for="">Lat</label>
			              <input type="text" name="lat" class="form-control input-sm textbox" name="lat" id="lat" value="{{ data_c('lat') }}">
			              <span class="text-danger" id="error-lat"></span>
			            </div>
						<div class="form-group col-sm-6">
			              <label for="">Lng</label>
			              <input type="text" name="lng" class="form-control input-sm textbox" name="lng" id="lng" value="{{ data_c('lng') }}">
			              <span class="text-danger" id="error-lng"></span>
			            </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">

	<div class="col-sm-4">
		<div class="m-portlet m-portlet--full-height  ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Slide 1
						</h3>

					</div>
				</div>
				<div class="m-portlet__head-tools" id="tools"><button onclick="editslide(1)" class="btn btn-sm btn-success m-btn m-btn--icon m-btn--pill m-btn--air"><i class="fa fa-edit"></i> Ubah</button></div>
			</div>
			<div class="m-portlet__body">
				<center>
				<img src="" width="250px" id="image_1">
				</center>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="m-portlet m-portlet--full-height  ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Slide 2
						</h3>

					</div>
				</div>
				<div class="m-portlet__head-tools" id="tools"><button onclick="editslide(2)" class="btn btn-sm btn-success m-btn m-btn--icon m-btn--pill m-btn--air"><i class="fa fa-edit"></i> Ubah</button></div>
			</div>
			<div class="m-portlet__body">
				<center>
				<img src="" width="250px" id="image_2">
				</center>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="m-portlet m-portlet--full-height  ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Slide 3
						</h3>

					</div>
				</div>
				<div class="m-portlet__head-tools" id="tools"><button onclick="editslide(3)" class="btn btn-sm btn-success m-btn m-btn--icon m-btn--pill m-btn--air"><i class="fa fa-edit"></i> Ubah</button></div>
			</div>
			<div class="m-portlet__body">
				<center>
				<img src="" width="250px" id="image_3">
				</center>
			</div>
		</div>
	</div>

</div>
<div class="row">
	<div class="col-sm-6">	
		<div class="m-portlet m-portlet--full-height ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Agenda
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<button class="btn btn-sm btn-danger m-btn m-btn--icon m-btn--pill m-btn--air" type="button" onclick="hapusagenda()"><i class="fa fa-trash"></i> Hapus </button>
					<button class="btn btn-sm btn-primary m-btn m-btn--icon m-btn--pill m-btn--air" type="button" onclick="addagenda()"><i class="fa fa-plus"></i> Tambah </button>
				</div>
			</div>
			<div class="m-portlet__body">
			<div id="agenda_content">
				
			</div>
				{{-- 
				 --}}
			<div id="pager">
				<ul id="pagination" class="pagination-sm"></ul>
			</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">	
		<div class="m-portlet m-portlet--full-height ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Sosial media
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<button class="btn btn-sm btn-info m-btn m-btn--icon m-btn--pill m-btn--air" type="button" onclick="save_sosmed()"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>
			<div class="m-portlet__body">
				<div id="">
					<form id="sosmed">
						{{ csrf_field() }}
						@foreach(App\sosmed::all() as $data)
						<div class="form-group">
							<div class="input-group">
								@if($data->name == 'fb')
								<span class="input-group-addon"><i class="fa fa-facebook"></i></span>
								@elseif($data->name == 'twitter')
								<span class="input-group-addon"><i class="fa fa-twitter"></i></span>
								@elseif($data->name == 'gplus')
								<span class="input-group-addon"><i class="fa fa-google"></i></span>
								@elseif($data->name == 'ig')
								<span class="input-group-addon"><i class="fa fa-instagram"></i></span>
								@endif
								<input type="text" name="{{ $data->name }}" value="{{ $data->url }}" class="form-control textbox" id="{{ $data->name }}">
							</div>
						</div>
							<span class="text-danger" id="error-{{ $data->name }}"></span>
						@endforeach	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@include('interface.backend.blog.form_kegiatan')
@include('interface.backend.blog.form_slide')
@endsection
@push('plugin-scripts')
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.twbsPagination.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
			    // Create the close button
			    var closebtn = $('<button/>', {
			        type:"button",
			        text: 'x',
			        id: 'close-preview',
			        style: 'font-size: initial;',
			    });
			    closebtn.attr("class","close pull-right");
			    // Set the popover default content
			    $('.image-preview').popover({
			        trigger:'manual',
			        html:true,
			        title: "<strong>Pratinjau</strong>"+$(closebtn)[0].outerHTML,
			        content: "Tidak Ada Gambar",
			        placement:'bottom'
			    });
			    // Clear event
			    $('.image-preview-clear').click(function(){
			        $('.image-preview').attr("data-content","").popover('hide');
			        $('.image-preview-filename').val("");
			        $('.image-preview-clear').hide();
			        $('.image-preview-input input:file').val("");
			        $(".image-preview-input-title").text("Jelajahi"); 
			    }); 
			    // Create the preview image
			    $(".image-preview-input input:file").change(function (){     
			        var img = $('<img/>', {
			            id: 'dynamic',
			            width:250,
			            height:200
			        });      
			        var file = this.files[0];
			        var reader = new FileReader();
			        // Set preview image into the popover data-content
			        reader.onload = function (e) {
			            $(".image-preview-input-title").text("Ubah");
			            $(".image-preview-clear").show();
			            $(".image-preview-filename").val(file.name);            
			            img.attr('src', e.target.result);
			            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
			        }        
			        reader.readAsDataURL(file);
			    });  
			});
</script>
<script type="text/javascript">
	function hapusagenda() {		
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
								     url:'{{ url('admin/agenda/delsel') }}',
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
										listagenda()
			                            count();

						        }
							     
							    });
							})
					    
				   
				 }
	}
	function listagenda() {
			var $pagination = $('#pagination'),
				totalDatas = 0,
				datas = [],
				displayDatas = [],
				datPerPage = 3,
				page = 1,
				totalPages = 0;
			$.ajax({
				dataType: 'json',
				method: 'GET',
				url: '{{ url('/admin/listagenda') }}',
				success: function(data){
						datas = data;
		              	totalDatas = datas.length;
		              	totalPages = Math.ceil(totalDatas / datPerPage);
		              	$pagination.twbsPagination('destroy');
		              	if(datas.length == 0){
		              		$('#agenda_content').html('');
							$('#agenda_content').append('<p>Tidak Ada data</p>');
						}else{
		              		apply_pagination()
		              	}	
				},
				error:function() {
					// body...
				}
			});
			function generate_data() {
				$('#agenda_content').html('');
				$.each(displayDatas, function(i,value) {
				var d = 
					'<div class="tab-content">'+
						'<div class="tab-pane active" id="m_widget2_tab1_content">'+
							'<div class="m-widget2">'+
								'<div class="m-widget2__item m-widget2__item--primary">'+
									'<div class="m-widget2__checkbox">'+
										'<label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">'+
										'<input type="checkbox" name="delsel[]" value="'+value.id+'" class="checkitem">'+
										'<span></span>'+
										'</label>'+
									'</div>'+
									'<div class="m-widget2__desc">'+
										'<span class="m-widget2__text">'+value.kegiatan+'</span><br>'+
										'<span class="m-widget2__user-name">'+
										'<a href="#" class="m-widget2__link">'+value.tgl_kegiatan+'</a>'+
										'</span>'+ 
									'</div>'+
									'<div class="m-widget2__actions">'+
										'<div class="m-widget2__actions-nav">'+
											'<div class="m-widget2__actions-nav">'+
												'<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">'+
													'<a href="#" class="m-dropdown__toggle">'+
														'<i class="la la-ellipsis-h"></i>'+
													'</a>'+
													'<div class="m-dropdown__wrapper">'+
														'<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 14.6953px;"></span>'+
														'<div class="m-dropdown__inner">'+
															'<div class="m-dropdown__body">'+
																'<div class="m-dropdown__content">'+
																	'<ul class="m-nav">'+
																		'<li class="m-nav__item">'+
																			'<a class="m-nav__link" onclick="editagenda('+value.id+')">'+
																				'<i class="m-nav__link-icon fa fa-edit"></i>'+
																				'<span class="m-nav__link-text">'+
																					'Ubah'+
																				'</span>'+
																			'</a>'+
																		'</li>'+
																		'<li class="m-nav__item" onclick="showagenda('+value.id+')">'+
																			'<a class="m-nav__link">'+
																				'<i class="m-nav__link-icon fa fa-eye"></i>'+
																				'<span class="m-nav__link-text">'+
																					'Detail'+
																				'</span>'+
																			'</a>'+
																		'</li>'+
																	'</ul>'+
																'</div>'+
															'</div>'+
														'</div>'+
													'</div>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+            
						'</div>'+
					'</div>';
					$('#agenda_content').append(d);
				});
			}
			function apply_pagination() {
				$pagination.twbsPagination({
					totalPages: totalPages,
					visiblePages: 6,
					first: "<i class='fa fa-angle-double-left'></i>",
			        prev: "<i class='fa fa-angle-left'></i>",
			        next: "<i class='fa fa-angle-right'></i>",
			        last: "<i class='fa fa-angle-double-right'></i>",
					onPageClick: function (event, page) {
						displayDatasIndex = Math.max(page - 1, 0) * datPerPage;
						endDat = (displayDatasIndex) + datPerPage;
						displayDatas = datas.slice(displayDatasIndex, endDat);
						generate_data();
					}
				});
			}
	}
	function addagenda() {
		$('#agenda .textbox').each(function(){ 
	        $(this).val(null);
	    });
		$('#modal_agenda').modal('show');
		$('.modal-title').text('Tambah Data');
		 method = 'add';
	}
	function editagenda(id) {
		$('#agenda .textbox').each(function(){ 
	        $(this).val(null);
	    });
		$.get('/admin/showagenda/'+id,function(data){
			$('#id').val(data.id);
			$('#kegiatan').val(data.kegiatan);
			$('#tgl_kegiatan').val(data.tgl_kegiatan);
			$('#keterangan').val(data.keterangan);
		});
		$('#modal_agenda').modal('show');
		$('.modal-title').text('Ubah Data');
		method = 'edit';
	}
	function showagenda(id) {
		$('#agenda .textbox').each(function(){ 
	        $(this).val(null);
	    });
		$.get('/admin/showagenda/'+id,function(data){
			$('#id').val(data.id);
			$('#kegiatan').val(data.kegiatan);
			$('#tgl_kegiatan').val(data.tgl_kegiatan);
			$('#keterangan').val(data.keterangan);
		});
		$('#modal_agenda').modal('show');
		$('.modal-title').text('Detail Data');
		$('#agenda .textbox').each(function(){ 
	        $(this).prop('readonly', true);
	    });
	}
	function slide(id) {
		$.get('/admin/slide/'+id, function(data){
			$.each(data.ket,function(i,o){
				$('#image_'+id).attr("src",'{{ url('img/slide/') }}'+'/'+i);
			})

		});
	}
	function editslide(id) {
		$('#slide_unique').val(id);
		$('#pic').val(null).trigger('change');
		$.get('/admin/slide/'+id, function(data){

			$.each(data.ket,function(i,o){
				$('#ketslide').val(o);
			})
			$('#modal_slide').modal('show');
			$('.modal-title').text('Ganti Slide'+ id);	
		});
		slide_unique = id;
	}
</script>
{{-- validasi --}}
<script type="text/javascript">
	$(document).ready(function(){		
		listagenda()
		for(i=1;i<=3;i++){
			slide(i)
		}
		$('.text-danger').hide();
		$('#kontak .textbox').each(function(){ 
	        $(this).blur(function(){ 
	            if (! $(this).val()){
				   get_error_text(this);
	            } else {
	               get_success_text(this);
	            }
	        });
	    });
	    $('#map .textbox').each(function(){ 
	        $(this).blur(function(){ 
	            if (! $(this).val()){
				   get_error_text(this);
	            } else {
	               get_success_text(this);
	            }
	        });
	    });
	    $('#agenda .textbox').each(function(){ 
	        $(this).blur(function(){ 
	            if (! $(this).val()){
				   get_error_text(this);
	            } else {
	               get_success_text(this);
	            }
	        });
	    });
	   	$('#slide .textbox').each(function(){ 
	        $(this).blur(function(){ 
	            if (! $(this).val()){
				   get_error_text(this);
	            } else {
	               get_success_text(this);
	            }
	        });
	    });
	    $('#sosmed .textbox').each(function(){ 
	        $(this).blur(function(){ 
	            if (! $(this).val()){
				   get_error_text(this);
	            } else {
	               get_success_text(this);
	            }
	        });
	    });
	    $('#agenda').submit(function(e){
			e.preventDefault();
			var valid=true;     
			$('#agenda').find('.textbox').each(function(){
			    if (! $(this).val()){
	                get_error_text(this);
	                valid = false;
	            } 
	            if ($(this).hasClass('no-valid')){
	                valid = false;
	            }
			});
			if (valid){
			    $.ajax({
			        type: "post",
			        url: '{{ url('/admin/saveagenda') }}',
			        data: {
			        		'_token'   : '{{ csrf_token() }}',
			        		'method'   : method,
			                'kegiatan' : $('#kegiatan').val(),
			                'tgl_kegiatan' : $('#tgl_kegiatan').val(),
			                'keterangan' : $('#keterangan').val(),
			                'id' : $('#id').val()
			        	  },
			        success: function(data) {
			        	listagenda()
			        	$('#agenda_content').html('');
			        	$('#pagination').html('');
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
			            if(method== 'add'){
			            	toastr.success("Data Menambah Agenda","Berhasil");
			            }else{
							toastr.success("Data Mengubah Agenda","Berhasil");
			            }
			            $('#modal_agenda').modal('hide');
			            $('#agenda .textbox').each(function(){ 
					        $(this).val(null);
					    });
			        },
			        error: function() {
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

			            toastr.error("Hubungi Developer","Error");
			            $('#modal_agenda').modal('hide');
			            $('#agenda .textbox').each(function(){ 
					        $(this).val(null);
					    });
			        }
			    });
			}
		});
		$('#slide').submit(function(e){
			e.preventDefault();
			var valid=true;     
			$('#slide').find('.textbox').each(function(){
			    if (! $(this).val()){
	                get_error_text(this);
	                valid = false;
	            } 
	            if ($(this).hasClass('no-valid')){
	                valid = false;
	            }
			});
			if (valid){
				var id = slide_unique;
				var data = new FormData($('#slide')[0])
			    $.ajax({
			        type: "post",
			        url: '{{ url('/admin/slide/') }}'+'/'+id,
			        processData: false,
	                contentType: false,
	                async: false,
	                cache: false,
	                data : data,
			        success: function(data) {
			        	slide(id)
			        	$('#agenda_content').html('');
			        	$('#pagination').html('');
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
			            toastr.success("Mengubah Slide","Berhasil");
			            $('#modal_slide').modal('hide');
			            $('#slide .textbox').each(function(){ 
					        $(this).val(null);
					    });
					 	$('#pic').val(null).trigger('change');

			        },
			        error: function() {
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

			            toastr.error("Hubungi Developer","Error");
			            $('#modal_slide').modal('hide');
			            $('#slide .textbox').each(function(){ 
					        $(this).val(null);
					    });
					    $('#pic').val(null).trigger('change');
			        }
			    });
			}
		});
		tinymce.init({
	        selector: ".editor",
	        contextmenu: false,
	        plugins: "textcolor link",
	        font_formats: "Sans Serif = arial, helvetica, sans-serif;Serif = times new roman, serif;Fixed Width = monospace;Wide = arial black, sans-serif;Narrow = arial narrow, sans-serif;Comic Sans MS = comic sans ms, sans-serif;Garamond = garamond, serif;Georgia = georgia, serif;Tahoma = tahoma, sans-serif;Trebuchet MS = trebuchet ms, sans-serif;Verdana = verdana, sans-serif",
	        toolbar: "fontselect | fontsizeselect | bold italic underline | forecolor | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | link unlink | undo redo"
	    });

	});
	function valid_email(email){
		var pola= new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
		return pola.test(email);
	}
	function get_error_text(textbox){
		var n = $(textbox).attr('name');
		$(textbox).addClass('no-valid');
	   	$('#error-'+n).show().text('Kolom tidak boleh kosong');
	}
	function get_success_text(textbox){
		var n = $(textbox).attr('name');
        $(textbox).removeClass('no-valid');
        $('#error-'+n).hide();
	}
	function save_kontak(type) {
		var valid=true;     
        $('#kontak').find('.textbox').each(function(){
            if (! $(this).val()){
            	valid = false;
                get_error_text(this);
            } 
            if ($(this).hasClass('no-valid')){
                valid = false;
            }
        });
        if (valid){
    	    $.ajax({
	            type: "post",
	            url: '{{ url('/admin/content/edit') }}',
	            data: {
	            		'_token': '{{ csrf_token() }}',
	            		'type'  : type,
	                    'lokasi': $('#lokasi').val(),
	                    'email' : $('#email').val(),
	                    'phone' : $('#phone').val()
	            	  },
	            success: function(data) {
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

                    toastr.success("Data Ter-ubah","Berhasil");
	            },
	            error: function() {
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

                    toastr.error("Hubungi Developer","Error");
	            }
	        });
        }

	}

	function save_map(type) {
		var valid=true;     
        $('#map').find('.textbox').each(function(){
            if (! $(this).val()){
            	valid = false;
                get_error_text(this);
            } 
            if ($(this).hasClass('no-valid')){
                valid = false;
            }
        });
        if (valid){
    	    $.ajax({
	            type: "post",
	            url: '{{ url('/admin/content/edit') }}',
	            data: {
	            		'_token': '{{ csrf_token() }}',
	            		'type'  : type,
	                    'lokasi': $('#searchmap').val(),
	                    'lat' : $('#lat').val(),
	                    'lng' : $('#lng').val()
	            	  },
	            success: function(data) {
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

                    toastr.success("Data Ter-ubah","Berhasil");
	            },
	            error: function() {
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

                    toastr.error("Hubungi Developer","Error");
	            }
	        });
        }

	}

	function save_sosmed() {
		var valid=true;     
        $('#sosmed').find('.textbox').each(function(){
            if (! $(this).val()){
            	valid = false;
                get_error_text(this);
            } 
            if ($(this).hasClass('no-valid')){
                valid = false;
            }
        });
        if (valid){
    	    $.ajax({
	            type: "post",
	            url: '{{ url('/admin/sosmed') }}',
	            data: $('#sosmed').serialize(),
	            success: function(data) {
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

                    toastr.success("Data Ter-ubah","Berhasil");
	            },
	            error: function() {
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

                    toastr.error("Hubungi Developer","Error");
	            }
	        });
        }

	}

	function save(type) {
		if(type == 'quotes'){
			var data = $('#c_'+type).val();
		}else{
			var data = tinymce.get('c_'+type).getContent();
		}
		if(data == 0){
		  swal({title: 'Tidak Boleh Kosong',text: "",type: 'error'})
		}else{
			if(type == 'quotes'){
				var isi = $('#c_'+type).val();
			}else{
				var isi = tinymce.get('c_'+type).getContent();
			}
			$.ajax({
	            type: "post",
	            url: '{{ url('/admin/content/edit') }}',
	            data: {
	            		'_token': '{{ csrf_token() }}',
	                    'type': type,
	                    'content': isi,
	            	  },
	            success: function(data) {
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

                    toastr.success("Data Ter-ubah","Berhasil");
	            },
	            error: function() {
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

                    toastr.error("Hubungi Developer","Error");
	            }
	        });
		}
	}
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO7ux0CVng-weBxmxNS7GpThvJvFqtLAQ&amp;libraries=places"></script>
<script type="text/javascript">
  var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat: {{ data_c('lat') }},
      lng: {{ data_c('lng') }}
    },
    zoom:16
  });

  var marker = new google.maps.Marker({
    position: {
      lat: {{ data_c('lat') }},
      lng: {{ data_c('lng') }}
    },
    map: map,
    draggable: true
  });

  var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

  google.maps.event.addListener(searchBox, 'places_changed', function(){

    var places = searchBox.getPlaces();
    var bounds = new google.maps.LatLngBounds();
    var i, place;

    for(i=0; place=places[i]; i++){
      bounds.extend(place.geometry.location);
      marker.setPosition(place.geometry.location);
    }

    map.fitBounds(bounds);
    map.setZoom(16);

  });

  google.maps.event.addListener(marker,'position_changed', function(){

    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();

    $('#lat').val(lat);
    $('#lng').val(lng);

  });
  
</script>
@endpush