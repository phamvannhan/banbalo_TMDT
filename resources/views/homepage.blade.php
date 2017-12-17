@extends('layouts.master')

@section('title',$title)

@section('content')



        
        <div class="main">
            <div class="container">


               <!--  BANNER -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="flexslider ma-nivoslider">
                            <div class="ma-loading"></div>
                            <!-- banner -->
                            <div id="ma-inivoslider-banner7" class="slides">
                            @if($dssli)
                                @foreach($dssli as $sli)
                                    <a href='{{url($sli->href)}}'><img src='{{url($sli->anh)}}' class="dn" /></a>
                                @endforeach
                            @endif
                            </div>
                        </div><!-- /.flexslider -->
                    </div> <!-- col-md-9 -->
                </div> <!-- row -->
                <!--  BANNER -->



            


                <div class="row">


                    <div class="col-sm-3 col-left">


                            @php($vitri = 11)
                            @php($flag = False)
                            @for($i = 16; $i <= 20; $i++)
                                @foreach($dsqc as $qc)
                                    @if($qc->quanliquangcao['id'] == $i)

                                   <!--  http://localhost:8000/upload/quangcao/2017/12/9/lQT_tải xuống.jpg -->
                                   <!-- {{url("$qc->anh")}} -->
                                        <div class="banner-left"><a href='{{url("$qc->href")}}' target="_blank"><img src='{{url("$qc->anh")}}' height="300" alt=""></a>
                                            <div class="banner-content">
                                                <h1>{{$qc->mota}}</h1>
                                            </div>
                                        </div>
                                        @php($flag = True)
                                        @break
                                    @endif
                                @endforeach
                                @if($flag == False)
                                    <div class="banner-left"><a href="#"><img src='{{url("upload/quangcao/2017/10/24/mua.jpg")}}' height="300" alt=""></a>
                                        <div class="banner-content">
                                            <h1>HÃY MUA QUẢNG CÁO</h1>
                                        </div>
                                    </div>
                                @endif
                                @php($flag = False)
                            @endfor
             
                    
                    </div><!-- /.col-left -->


                     
                    <div class="col-sm-9 col-right">

                        <!-- san pham sale -->
                        <div class="featuredproductslider-container"> 
                            <div class="title-group1"><h2>Sản Phẩm Sale</h2></div>
                            <div id="featured-products" class="owl-container">
                                <div class="owl">
                                    @if($dssale)
                                        @foreach($dssale as $sale)
                                            <div class='productslider-item item'>
                                                <div class="item-inner">
                                                    <div class="images-container">
                                                        <div class="product_icon">
                                                            
                                                            <div class='new-icon'><span>new</span></div>
                                                         
                                                            <div class="sale-icon"><span>sale</span></div>
                                                        </div>
                                                        <a href='{{route("sanpham",["sp"=>$sale->id."-".$sale->slug])}}' title="Nunc facilisis" class="product-image">
                                                            <img src='{{url($sale->anhdaidien)}}' alt="Nunc facilisis" height="200" />
                                                        </a>
                                                        <div class="box-hover">
                                                            <ul class="add-to-links">
                                                                @if($sale->soluong > 0)
                                                                <li><a data-id='{{$sale->id}}' class="link-cart">Add to Cart</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="des-container">
                                                        <h2 class="product-name"><a href="#" title="Nunc facilisis">{{$sale->ten}}</a></h2>
                                                        <div class="price-box">
                                                            <p class="special-price">
                                                                <span class="price-label">Special Price</span>
                                                                <span class="price">{{number_format($sale->dongia-(($sale->dongia*$sale->khuyenmai)/100))}} VNĐ</span>
                                                            </p>
                                                            <p class="old-price">
                                                                <span class="price-label">Regular Price: </span>
                                                                <span class="price">{{number_format($sale->dongia)}} VNĐ</span>
                                                            </p>
                                                        </div>
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating" style="width:67%"></div>
                                                            </div>
                                                            <span class="amount"><a href="#">{{number_format($sale->luotxem)}} Review(s)</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- san pham sale -->


                        <!-- san pham mới nhất -->
                        <div class="featuredproductslider-container"> 
                            <div class="title-group1"><h2>Sản Phẩm Mới Nhất</h2></div>
                            <div id="featured-products" class="owl-container">
                                <div class="owl">
                                    @if($dsnew)
                                        @foreach($dsnew as $new)
                                            <div class='productslider-item item'>
                                                <div class="item-inner">
                                                    <div class="images-container">
                                                        <div class="product_icon">
                                                            <div class='new-icon'><span>new</span></div>
                                                            @if($new->khuyenmai > 0)
                                                                <div class="sale-icon"><span>sale</span></div>
                                                            @endif
                                                        </div>
                                                        <a href='{{route("sanpham",["sp"=>$new->id."-".$new->slug])}}' title="Nunc facilisis" class="product-image">
                                                            <img src='{{url($new->anhdaidien)}}' alt="Nunc facilisis" height="200" />
                                                        </a>
                                                        <div class="box-hover">
                                                            <ul class="add-to-links">
                                                                @if($new->soluong > 0)
                                                                <li><a data-id='{{$new->id}}' class="link-cart">Add to Cart</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="des-container">
                                                        <h2 class="product-name"><a href="#" title="Nunc facilisis">{{$new->ten}}</a></h2>
                                                        <div class="price-box">
                                                            @if($new->khuyenmai > 0)
                                                                <p class="special-price">
                                                                    <span class="price-label">Special Price</span>
                                                                    <span class="price">{{number_format($new->dongia-(($new->dongia*$new->khuyenmai)/100))}} VNĐ</span>
                                                                </p>
                                                                <p class="old-price">
                                                                    <span class="price-label">Regular Price: </span>
                                                                    <span class="price">{{number_format($new->dongia)}} VNĐ</span>
                                                                </p>
                                                            @else
                                                                <p class="special-price">
                                                                    <span class="price-label">Regular Price:</span>
                                                                    <span class="price">{{number_format($new->dongia)}} VNĐ</span>
                                                                </p>
                                                            @endif
                                                        </div>
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating" style="width:67%"></div>
                                                            </div>
                                                            <span class="amount"><a href="#">{{number_format($new->luotxem)}} Review(s)</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div><!-- /.featuredproductslider-container -->
                         <!-- san pham mới nhất -->


                         <!-- san pham chuyen muc -->
                        @foreach($dscm as $cm)

                            @if($cm->sanpham()->get()->toArray())   
                                <div class="newproductslider-container"> 
                                    <div class="title-group1"><h2>{{$cm->ten}}</h2></div>
                                    <div id="new-products" class="owl-container">
                                        <div class="owl">
                                            @foreach($cm->sanpham()->get() as $sp)
                                            <div class='productslider-item item'>
                                                <div class="item-inner">
                                                    <div class="images-container">
                                                        <div class="product_icon">
                                                            <div class='new-icon'><span>new</span></div>
                                                            @if($sp->khuyenmai > 0)
                                                                <div class="sale-icon"><span>sale</span></div>
                                                            @endif
                                                        </div>
                                                        <a href='{{route("sanpham",["sp"=>$sp->id."-".$sp->slug])}}' title="Nunc facilisis" class="product-image">
                                                            <img src='{{url($sp->anhdaidien)}}' alt="Nunc facilisis" height="200" />
                                                        </a>
                                                        <div class="box-hover">
                                                            <ul class="add-to-links">
                                                                 @if($sp->soluong > 0)
                                                                <li><a data-id='{{$sp->id}}' class="link-cart">Add to Cart</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="des-container">
                                                        <h2 class="product-name"><a href="#" title="Nunc facilisis">{{$sp->ten}}</a></h2>
                                                        <div class="price-box">
                                                                @if($sp->khuyenmai > 0)
                                                                    <p class="special-price">
                                                                        <span class="price-label">Special Price</span>
                                                                        <span class="price">{{number_format($sp->dongia-(($sp->dongia*$sp->khuyenmai)/100))}} VNĐ</span>
                                                                    </p>
                                                                    <p class="old-price">
                                                                        <span class="price-label">Regular Price: </span>
                                                                        <span class="price">{{number_format($sp->dongia)}} VNĐ</span>
                                                                    </p>
                                                                @else
                                                                    <p class="special-price">
                                                                        <span class="price-label">Regular Price:</span>
                                                                        <span class="price">{{number_format($sp->dongia)}} VNĐ</span>
                                                                    </p>
                                                                @endif
                                                        </div>
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating" style="width:67%"></div>
                                                            </div>
                                                            <span class="amount"><a href="#">{{number_format($sp->luotxem)}} Review(s)</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            <!-- /.newproductslider-container -->
                            <!-- san pham chuyen muc -->
                            @endif
                        @endforeach



                    </div><!-- /.col-right -->
                </div>
            </div>
        </div><!-- /.main -->
        @endsection

        @section('scripts')
            <script type="text/javascript" src='{{url("js/functions.js")}}'></script>
        @endsection