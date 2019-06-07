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
Content Setup
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
					Content Setup
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
<form action="{{url('admin/content_setup')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" method="POST">
    <div class="row">
        <div class="col-sm-6">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Logo
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <button type="submit" class="btn btn-accent m-btn--air m-btn--pill"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div style="text-align: center; border: solid 2px #999; background: #ddd; margin: 10px 0px">
                        <img class="img-responsive" style="width: 300px;" src="{{asset('img/'.$content->logo)}}">
                    </div>
                    <input class="form-control" type="file" name="logo">
                </div>
            </div>
        </div>
        <div class="col-sm-6">	
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Pengaturan Dasar
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <button class="btn btn-info m-btn m-btn--icon m-btn--pill m-btn--air" type="submit"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-google"></i></span>
                                <input type="text" name="email" value="{{$content->email}}" class="form-control textbox" id="gplus">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                <input type="text" name="facebook" value="{{$content->facebook}}" class="form-control textbox" id="gplus">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                <input type="text" name="twitter" value="{{$content->twitter}}" class="form-control textbox" id="gplus">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                <input type="text" name="instagram" value="{{$content->instagram}}" class="form-control textbox" id="gplus">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" name="no_tlp" value="{{$content->no_tlp}}" class="form-control textbox" id="gplus">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-chrome"></i></span>
                                <input type="text" name="instagram" value="{{$content->website}}" class="form-control textbox" id="gplus">
                            </div>
                        </div>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" name="nama_web" value="{{$content->nama_web}}" class="form-control textbox" id="gplus">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                About
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <button class="btn btn-accent m-btn--air m-btn--pill " type="submit"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <textarea class="form-control editor" name="about">-</textarea>
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
                        <button class="btn btn-accent m-btn--air m-btn--pill " type="submit"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <form id="map" role="form">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control textbox" name="alamat" id="searchmap" value="{{$content->alamat}}">
                            <span class="text-danger" id="error-searchmap"></span>
                        </div>
                        <div id="map-canvas"></div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="">Lat</label>
                                <input type="text" name="lat" class="form-control input-sm textbox" name="lat" id="lat" value="{{ $content->lat }}">
                                <span class="text-danger" id="error-lat"></span>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">Lng</label>
                                <input type="text" name="lng" class="form-control input-sm textbox" name="lng" id="lng" value="{{ $content->lng }}">
                                <span class="text-danger" id="error-lng"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('plugin-scripts')
<script src="{{ asset('/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.twbsPagination.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO7ux0CVng-weBxmxNS7GpThvJvFqtLAQ&amp;libraries=places"></script>
<script type="text/javascript">
  $(() => {
    tinymce.init({
        selector: ".editor",
        contextmenu: false,
        plugins: "textcolor link",
        font_formats: "Sans Serif = arial, helvetica, sans-serif;Serif = times new roman, serif;Fixed Width = monospace;Wide = arial black, sans-serif;Narrow = arial narrow, sans-serif;Comic Sans MS = comic sans ms, sans-serif;Garamond = garamond, serif;Georgia = georgia, serif;Tahoma = tahoma, sans-serif;Trebuchet MS = trebuchet ms, sans-serif;Verdana = verdana, sans-serif",
        toolbar: "fontselect | fontsizeselect | bold italic underline | forecolor | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | link unlink | undo redo"
    });
  })
  var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat: {{ $content->lat }},
      lng: {{ $content->lng }}
    },
    zoom:16
  });

  var marker = new google.maps.Marker({
    position: {
      lat: {{ $content->lat }},
      lng: {{ $content->lng }}
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