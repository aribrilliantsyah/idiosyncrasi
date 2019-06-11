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
        <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
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
            <div class="blog-item listing-effect col-md-12 mb_50">
                <div class="post-format">
                <div class="thumb post-img"><a href="{{ asset('img/cover/'. $blog->picture) }}" title="Beautiful Lady"> <img src="{{ asset('img/cover/'. $blog->picture) }}" alt="themini"></a></div>
                <div class="post-type"> <i class="fa fa-picture-o" aria-hidden="true"></i> </div>
                </div>
                <div class="post-info mtb_20 ">
                    <h2 class="mb_10"> <a href="single_blog.html">{{ $blog->judul }}</a> </h2>
                    <div>
                        {!! $blog->content !!}
                    </div>
                </div>
                <div class="date"> <i class="fa fa-calendar" aria-hidden="true"></i>11 May 2017 </div>
                </div>
                {{-- <div class="author-about mt_50">
                <h3 class="author-about-title">About the Author</h3>
                <div class="author mtb_30">
                    <div class="author-avatar"> <img alt="" src="images/user1.jpg"></div>
                    <div class="author-body">
                    <h5 class="author-name"><a href="#">Radley Lobortis</a></h5>
                    <div class="author-content mt_10">Description .</div>
                    </div>
                </div>
                </div> --}}
                <div id="comments" class="comments-area mt_50">
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection