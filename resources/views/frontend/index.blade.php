@extends('layouts.darklook')
@section('content')
<div class="container">
    <!-- =====  SUB BANNER  STRAT ===== -->
    <div class="row">
        <div class="col-sm-3 mt_20 cms-icon ">
        <div class="feature-i-left ptb_30 ">
            <div class="icon-right Shipping"></div>
            <h6>Best Quality</h6>
            <p>Best item for customer</p>
        </div>
        </div>
        <div class="col-sm-3 mt_20 cms-icon ">
        <div class="feature-i-left ptb_30 ">
            <div class="icon-right Order"></div>
            <h6>Order Online Or Offline</h6>
            <p>24 hours</p>
        </div>
        </div>
        <div class="col-sm-3 mt_20 cms-icon ">
        <div class="feature-i-left ptb_30 ">
            <div class="icon-right Save"></div>
            <h6>Shop And Save</h6>
            <p>For All Spices & Herbs</p>
        </div>
        </div>
        <div class="col-sm-3 mt_20 cms-icon ">
        <div class="feature-i-left ptb_30 ">
            <div class="icon-right Safe"></div>
            <h6>Safe Shoping</h6>
            <p>Ensure genuine 100%</p>
        </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-sm-12 mt_30">
        <!-- =====  PRODUCT TAB  ===== -->
        <div id="product-tab" class="mt_10">
            <div class="heading-part mb_10 ">
            <h2 class="main_title">Products</h2>
            </div>
            <ul class="nav text-right">
            <li class="active"> <a href="#nArrivals" data-toggle="tab">New Arrivals</a> </li>
            <li><a href="#Bestsellers" data-toggle="tab">Bestsellers</a> </li>
            <li><a href="#Featured" data-toggle="tab">Featured</a> </li>
            </ul>
            <div class="tab-content clearfix box">
            <div class="tab-pane active" id="nArrivals">
                <div class="nArrivals owl-carousel">

                    @foreach($gallery as $item)
                    <div class="product-grid">
                        <div class="item">
                            <div class="product-thumb">
                                <div class="image product-imageblock"> 
                                    <a href="#"> 
                                        <img data-name="product_image" src="{{asset('/img/cover/'. $item->picture)}}" alt="" title="" class="img-responsive"> 
                                        <img src="{{asset('/img/cover/'. $item->picture)}}" alt="" title="" class="img-responsive"> 
                                    </a>
                                </div>
                                <div class="caption product-detail text-center">
                                    <h6 data-name="product_name" class="product-name" style="margin-top: 15px">
                                        <a href="#" title="Casual Shirt With Ruffle Hem">{{$item->judul}}</a>
                                    </h6>
                                    <span class="price">
                                        <span class="amount"><span class="currencySymbol">Rp. {{$item->price}}</span>
                                    </span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane" id="Bestsellers">
                <div class="Bestsellers owl-carousel">
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product1-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product3.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product3-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product5.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product5-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product6.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product6-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product8.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product8-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product10.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product10-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="tab-pane" id="Featured">
                <div class="Featured owl-carousel">
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product2.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product2-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product4.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product4-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product6.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product6-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product8.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product8-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product10.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product10-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product2.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="images/product/product2-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- =====  PRODUCT TAB  END ===== -->
        </div>
    </div>

    <!-- =====  SUB BANNER END  ===== -->
    <div id="brand_carouse" class="ptb_60 text-center">
        <div class="type-01">
        <div class="heading-part mb_10 ">
            <h2 class="main_title">Brand Logo</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <div class="brand owl-carousel ptb_20">
                @foreach($brand as $item)
                    <div class="item text-center"> <a href="#"><img src="{{asset('img/brand/'.$item->img)}}" alt="" class="img-responsive" /></a> </div>
                @endforeach
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection