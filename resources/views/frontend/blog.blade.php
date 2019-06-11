@extends('layouts.darklook')
@section('content')
<div class="container">
    <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
        <div class="breadcrumb ptb_20">
            <h1>Blog</h1>
            <ul>
            <li><a href="index.html">Home</a></li>
            <li class="active">Blog</li>
            </ul>
        </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
            <div class="left_banner left-sidebar-widget mt_30 mb_40">
                
            </div>
            <div class="blog-category left-sidebar-widget mb_50">
                <div class="heading-part mb_20 ">
                <h2 class="main_title">Blog Category</h2>
                </div>
                <ul>
                <li><a href="#">Appliances</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
        <div class="row">
            <div class="three-col-blog text-left">
                @foreach ($blog as $item)
                    <div class="blog-item col-md-6 mb_30">
                        <div class="post-format">
                        <div class="thumb post-img"><a href="single_blog.html"> <img src="{{ asset('img/cover/'. $item->picture) }}"  alt="themini"></a></div>
                        <div class="post-type"><i class="fa fa-music" aria-hidden="true"></i></div>
                        </div>
                        <div class="post-info mtb_20 ">
                        <h3 class="mb_10"> <a href="single_blog.html">{{ $item->judul }}</a> </h3>
                        <p>
                            @php
                                $new = preg_replace('#\<(.*?)\>(.*?)\</(.*?)\>#', '\\2', $item->content);    
                            @endphp
                            {!! substr($new,0,100).'...' !!}
                        </p>
                        <div class="details mtb_20">
                            <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
                            <div class="more pull-right"> 
                                <a href="{{ url('detail_blog/'. $item->slug) }}">Read more <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $blog->render() }}
        {{-- <div class="pagination-nav text-center mtb_20">
            <ul>
            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div> --}}
        </div>
    </div>
</div>
@endsection