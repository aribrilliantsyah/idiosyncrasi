@extends('layouts.user')
@section('content')
<style>
  #map-canvas{
    width: 100%;
    height: 400px;
  }
</style>
@php
function data_c($type){
    return App\content::where('jenis', $type)->first()->ket;
}
@endphp
<div class="section-bg-image bg-top white" style="background-image:url(../images/hd-8.jpg)">
    <div class="container content">
        <hr class="space" />
        <hr class="space m" />
        <div class="row">
            <div class="col-md-8 col-center text-center">
                <h2>Lokasi</h2>
                    <h4>Temukan Kami di lokasi yang tertera di bawah ini.</h4>
            </div>
        </div>
        <hr class="space" />
        <hr class="space" />
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <hr class="space" />
        <div class="row">
            <div class="col-md-12">
                <div id="map-canvas" class="google-map"></div>
            </div>
            <div class="col-md-12">
                <br>
                <p>Alamat lengkap ada di <li>{{ data_c('lokasi') }}</li></p>
            </div>
        </div>
    </div>
</div>
<hr class="space" />

</div>
</div>
@endsection
@push('script')
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
    draggable: false
  });
  
</script>
@endpush