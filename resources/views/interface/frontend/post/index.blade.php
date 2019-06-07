@extends('layouts.user')
@section('content')
<div class="section-bg-image bg-top white" style="background-image:url(../images/hd-8.jpg)">
    <div class="container content">
        <hr class="space" />
        <hr class="space m" />
        <div class="row">
            @php
            $f=App\fitrah::count();
            $m=App\mal::count();
            $a=App\amal::count();

            $total=$f+$m+$a;

            if($total > 0){
                $total = $total - 1;
            }else{
                $total = 0;
            }
            @endphp
            <div class="col-md-8 col-center text-center">
                <h1>Ayo Gabung Dengan {{ $total }}+<b></b> Donatur lainya</h1>
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
            <div class="col-md-8 col-sm-12">
                <div class="flexslider slider nav-inner white" data-options="controlNav:true,directionNav:false">   
                    <div class="flex-viewport" style="overflow: hidden; position: relative;">       <ul class="slides" style="width: 800%; transition-duration: 0s; transform: translate3d(-733px, 0px, 0px);">
                        @php
                        function data_c($type){
                            return App\content::where('jenis', $type)->first()->ket;
                        }
                        @endphp
                        @foreach(data_c('slide1') as $image => $ket)
                        <li class="clone" aria-hidden="true" style="width: 733.328px; float: left; display: block;">
                                <a class="img-box lightbox inner" href="">
                                    <span><img src="{{asset('/img/slide/'.$image)}}" alt="" draggable="false"></span>
                                    <span class="caption-box">
                                        <span class="caption">
                                         {{$ket}}
                                     </span>
                                 </span>
                             </a>
                         </li>
                     @endforeach
                     @foreach(data_c('slide2') as $image => $ket)
                     <li style="width: 733.328px; float: left; display: block;" class="flex-active-slide">
                        <a class="img-box lightbox inner" href="">
                            <span><img src="{{asset('/img/slide/'.$image)}}" alt="" draggable="false" height="1200px"></span>
                            <span class="caption-box">
                                <span class="caption">
                                    {{$ket}}
                                </span>
                            </span>
                        </a>
                    </li>
                    @endforeach
                    @foreach(data_c('slide3') as $image => $ket)
                    <li style="width: 733.328px; float: left; display: block;" class="">
                        <a class="img-box lightbox inner" href="../../../www.framework-y.com/images/thumb-large.png">
                            <span><img src="{{asset('/img/slide/'.$image)}}" alt="" draggable="false"></span>
                            <span class="caption-box">
                                <span class="caption">
                                    {{$ket}}
                                </span>
                            </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <p class="block-quote quote-1 no-margins">
            {!! data_c('quotes') !!}
        </p>
        <hr class="space m visible-sm" />

    </div>
</div>
<div class="row">
</div>
<div class="row">
    @php
    use App\post;
    $berita1 = post::orderBy('views','desc')->take(3)->get();
    @endphp
    @foreach($berita1 as $data)
    <div class="col-md-4">
        <div class="advs-box advs-box-multiple shadow-1" data-anima="scale-rotate" data-trigger="hover">
            <a class="img-box"><img class="anima" src="{{asset('/img/cover/'.$data->picture)}}" alt="" /></a>
            <div class="circle anima-rotate-20 anima">{{$data->views}}<span>Views</span></div>
            <div class="advs-box-content">
                <h3>{!! substr($data->judul,0,10)."..." !!}</h3>
                <p>
                    {!! substr($data->content,0,90)."..." !!}
                </p>
                <a class="btn-text" href="{{url('/post/'.$data->slug)}}">Selengkapnya</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-6">
                <h1>Visi </h1>
                <hr class="space m" />
                {!! data_c('visi') !!}
                <hr class="space l" />
            </div>
            <div class="col-md-6">
                <h1>Misi </h1>
                <hr class="space m" />
                {!! data_c('misi') !!}
                <hr class="space l" />
            </div>
        </div>
    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-4">
                <h1>Agenda</h1>
            </div>
            <div class="col-md-8">
                <div class="flexslider carousel outer-navs no-navs" data-options="minWidth:200,itemMargin:30,numItems:2,controlNav:false,directionNav:true">
                        <div class="flex-viewport" style="overflow: hidden; position: relative;">
                            <ul class="slides" style="width: 600%; transition-duration: 0.6s; transform: translate3d(0px, 0px, 0px);">
                                @if(App\agenda::all()->count() == 0)
                                Tidak Ada Data
                                @else
                                @foreach(App\agenda::orderBy('updated_at','DCS')->get() as $data)
                                <li style="padding-right: 30px; width: 381.7px; float: left; display: block;">
                                    <div class="advs-box advs-box-side-icon">
                                        <div class="icon-box">
                                            <i class="fa fa-calendar-o icon text-xl"></i>
                                        </div>
                                        <div class="caption-box">
                                            <h3 class="text-m">{{ $data->kegiatan }}</h3>
                                            <span class="extra-content">{{$data->tgl_kegiatan }}</span>
                                            <p class="text-s">
                                                {!! $data->keterangan !!}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <ul class="flex-direction-nav">
                            <li class="flex-nav-prev"><a class="flex-prev" href="#"></a></li>
                            <li class="flex-nav-next"><a class="flex-next" href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-12">
                <h1>Tentang </h1>
                <hr class="space m" />
                {!! data_c('tentang') !!}
                <hr class="space l" />
            </div>
        </div>
    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
</div>
@endsection