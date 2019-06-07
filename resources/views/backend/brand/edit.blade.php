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
Brand 
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
					Brand
				</span>
			</a>
		</li>
		<li class="m-nav__separator">
			-
		</li>
		<li class="m-nav__item">
			<a class="m-nav__link">
				<span class="m-nav__link-text">
					Ubah
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
							Ubah Brand
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
							<form class="form-horizontal" method="post" action="{{ route('brand.update', $model->id) }}" files="true" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PUT">
								<div class="form-group">
									<label class="form-control-label">
										Brand Logo
									</label>
									<div class="input-group image-preview">
						                <input type="text" class="form-control image-preview-filename" name="pic" disabled="disabled"> 
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
                                    @if($model->img != null)
                                    <img src="{{ asset('/img/brand/'.$model->img) }}" style="border-radius: 20px;width: 300px">
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
<script>

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