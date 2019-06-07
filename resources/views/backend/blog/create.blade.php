@extends('layouts.admin')

@push('plugin-styles')
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
		<li class="m-nav__separator">
			-
		</li>
		<li class="m-nav__item">
			<a class="m-nav__link">
				<span class="m-nav__link-text">
					Tambah
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
							Tambah Postingan
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
				</div>
			</div>
			<div class="m-portlet__body">
				<!--begin:: Widgets/Blog-->
				<div class="m-widget19">
					<div class="m-widget19__content">
						<div class="m-widget19__body">
							<form class="form-horizontal" method="post" action="{{ route('blog_manager.store') }}" files="true" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="recipient-name" class="form-control-label">

										Judul
									</label>
									<span class="text-danger"></span>
									@if(isset($judul))
									<input type="text" name="title" class="form-control input" value="{{ $judul }}">
									@else
									<input type="text" name="title" class="form-control input" value="{{ old('title') }}">
									@endif
									 @if ($errors->has('title'))
	                                    <span class="text-danger">
	                                        <strong>{{ $errors->first('title') }}</strong>
	                                    </span>
	                                @endif
								</div>
								
								<div class="form-group">
									<label class="form-control-label">
										Cover
									</label>
									<div class="input-group image-preview">
						                <input type="text" class="form-control image-preview-filename" name="image" disabled="disabled"> 
						                <span class="input-group-btn">
						                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
						                        <span class="fa fa-remove"></span> Hapus
						                    </button>
						                    <div class="btn btn-default image-preview-input">
						                        <span class="fa fa-folder-open"></span>
						                        <span class="image-preview-input-title">Jelajahi</span>
						                        <input type="file" accept="image/png, image/jpeg, image/gif, image/svg, image/bmp, image/jpg" name="image"/>
						                    </div>
						                </span>
						            </div>
						            @if ($errors->has('image'))
	                                    <span class="text-danger">
	                                        <strong>{{ $errors->first('image') }}</strong>
	                                    </span>
	                                @endif
								</div>
								 
						
								<div class="form-group">
									<label for="recipient-name" class="form-control-label">
										Kategori 
									</label>
									<span class="text-danger"></span>
									<select name="kategori_id" class="form-control select2">
										@php
										$kat = App\KategoriPost::all();
										@endphp
										<option value="">-</option>
										@foreach($kat as $data)		
										<option value="{{ $data->id }}">{{ $data->name }}</option>
										@endforeach
									</select>
									 @if ($errors->has('kategori_id'))
	                                    <span class="text-danger">
	                                        <strong>{{ $errors->first('kategori_id') }}</strong>
	                                    </span>
	                                @endif
								</div>
								<div class="form-group">
									<label for="message-text" class="form-control-label">
										Deskripsi
									</label>
									<textarea class="form-control" name="content" id="post">
										{{ old('content') }}
									</textarea>
									 @if ($errors->has('content'))
	                                     <span class="text-danger">
	                                        <strong>{{ $errors->first('content') }}</strong>
	                                    </span>
	                                @endif
								</div>
								<button type="submit" class="btn btn-sm btn-primary">
									<i class="fa fa-save"></i> Save
								</button>
								<button type="reset" class="btn btn-sm btn-secondary">
									<i class="fa fa-refresh"></i>  Reset
								</button>
							</form>
						</div>
					</div>
				</div>
				<!--end:: Widgets/Blog-->
			</div>
		</div>
	</div>
</div>
@endsection
@push('plugin-scripts')
<script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
<script>
	var options = {
					filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
					filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
					filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
					filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
				  };
    CKEDITOR.replace( 'content' , options);

	$(document).on('click', '#close-preview', function(){ 
	    $('.image-preview').popover('hide');
	    // Hover befor close the preview
	    $('.image-preview').hover(
	        function () {
	           $('.image-preview').popover('show');
	        }, 
	         function () {
	           $('.image-preview').popover('hide');
	        }
	    );    
	});

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
@endpush