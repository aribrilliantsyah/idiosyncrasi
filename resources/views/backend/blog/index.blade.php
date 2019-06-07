@extends('layouts.admin')
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
					Post
				</span>
			</a>
		</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Daftar Postingan
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<a href="{{ route('blog_manager.create') }}" class="btn btn-sm btn-accent m-btn--air m-btn--pill "><i class="fa fa-plus"></i> Tambah Postingan </a>
					<button class="btn btn-sm btn-danger m-btn--air m-btn--pill " id="delsel">
						<i class="fa fa-trash"></i> Hapus
					</button>
				</div>
			</div>
			<div class="m-portlet__body">
				<table id="m-datatable" class="table table-striped table-hover table-hover">
	
				</table>

			</div>
		</div>
	</div>
</div>
@endsection
@push('plugin-scripts')
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/skins/bootstrapck') }}"></script>
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script>
	var table = $('#m-datatable').DataTable({
		language: {
                    url: "{{ asset('datatables/custom.json') }}",
                  },
		processing: true,
		ajax: "{{ url('/api/blog_list') }}",
		columns:[
			{
				data: 'check',
			    name: 'check', 
			    title: '<input type="checkbox" name="checkbox" id="checkAll">', 
			    orderable: false,
			    searchable: false
			},
			{data: 'picture',name: 'picture' , title: 'Gambar'},
			{data: 'judul',name: 'judul' , title: 'Judul'},
			{data: 'content',name: 'content' , title: 'Deskripsi'},
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
$(document).ready(function(){
	//cekall
	$("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
	$('#checkall').change(function() {
		$('.checkitem').prop("checked", $(this).prop("checked"));
	});
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
				     url:'{{ url('admin/blog_manager/delsel') }}',
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
});

</script>
@endpush