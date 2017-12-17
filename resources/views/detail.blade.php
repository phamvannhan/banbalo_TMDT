@extends('layouts.master')

@section('title', $sp->ten)

@section('content')
	 <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-left">

                            <div class="block">
                            <div class="title-group"><h2>Sản Phẩm Mới Nhất</h2></div>
                            <div id="special-offer" class="owl-container">
                                <div class="owl">

                                    @if($dsnew)
                                        @for($i = 0; $i < count($dsnew); $i++)
                                                @if($i%4==0)
                                                    <div class='sepecialoffer-item item'>
                                                        <div class="item-inner first">
                                                @elseif($i%4==3)
                                                        <div class="item-inner last">
                                                @else
                                                        <div class="item-inner">
                                                @endif

                                                    <div class="images-container">
                                                        <a href='{{route("sanpham",["sp"=>$dsnew[$i]->id."-".$dsnew[$i]->slug])}}' title="Primis in faucibus" class="product-image">
                                                            <img src='{{url($dsnew[$i]->anhdaidien)}}' alt="Primis in faucibus" height="100" />
                                                        </a>
                                                    </div>
                                                    <div class="des-container">
                                                        <h2 class="product-name"><a href="#" title="Primis in faucibus">{{$dsnew[$i]->ten}}</a></h2>
                                                        <div class="price-box">
                                                    @if($dsnew[$i]->khuyenmai > 0)
                                                        <p class="special-price">
                                                                <span class="price">{{number_format($dsnew[$i]->dongia-(($dsnew[$i]->dongia-$dsnew[$i]->khuyenmai)/100))}} VNĐ</span>
                                                        </p>
                                                        <p class="old-price">
                                                            <span class="price">{{number_format($dsnew[$i]->dongia)}} VNĐ</span>
                                                        </p>
                                                    @else
                                                        <p class="special-price">
                                                            <span class="price">{{number_format($dsnew[$i]->dongia)}} VNĐ</span>
                                                        </p>
                                                    @endif
                                                        </div>
                                                    </div>
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:87%"></div>
                                                        </div>
                                                        <span class="amount"><a href="#">{{number_format($dsnew[$i]->luotxem)}} Review(s)</a></span>
                                                    </div>
                                              
                                                @if($i%4==0)
                                                        </div>
                                                    @if($i == count($dsnew) - 1)
                                                        </div>
                                                    @endif
                                                @elseif($i%4==3)
                                                        </div>
                                                    </div>
                                                @else
                                                        </div>
                                                    @if($i == count($dsnew) - 1)
                                                        </div>
                                                    @endif
                                                @endif
                                        @endfor
                                    @endif
                                        
                                            
                                    </div>
                                </div>
                        </div>



                        <div class="block">
                            <div class="title-group"><h2>Sản Phẩm SALE</h2></div>
                            <div id="special-offer" class="owl-container">
                                <div class="owl">

                                        @if($dssale)
                                        @for($i = 0; $i < count($dssale); $i++)
                                                @if($i%4==0)
                                                    <div class='sepecialoffer-item item'>
                                                        <div class="item-inner first">
                                                @elseif($i%4==3)
                                                        <div class="item-inner last">
                                                @else
                                                        <div class="item-inner">
                                                @endif
                                            
                                                    <div class="images-container">
                                                        <a href='{{route("sanpham",["sp"=>$dssale[$i]->id."-".$dssale[$i]->slug])}}' title="Primis in faucibus" class="product-image">
                                                            <img src='{{url($dssale[$i]->anhdaidien)}}' alt="Primis in faucibus" height="100" />
                                                        </a>
                                                    </div>
                                                    <div class="des-container">
                                                        <h2 class="product-name"><a href="#" title="Primis in faucibus">{{$dsnew[$i]->ten}}</a></h2>
                                                        <div class="price-box">
                                                    @if($dssale[$i]->khuyenmai > 0)
                                                        <p class="special-price">
                                                                <span class="price">{{number_format($dssale[$i]->dongia-(($dssale[$i]->dongia-$dssale[$i]->khuyenmai)/100))}} VNĐ</span>
                                                        </p>
                                                        <p class="old-price">
                                                            <span class="price">{{number_format($dssale[$i]->dongia)}} VNĐ</span>
                                                        </p>
                                                    @else
                                                        <p class="special-price">
                                                            <span class="price">{{number_format($dssale[$i]->dongia)}} VNĐ</span>
                                                        </p>
                                                    @endif
                                                        </div>
                                                    </div>
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:87%"></div>
                                                        </div>
                                                        <span class="amount"><a href="#">{{number_format($dssale[$i]->luotxem)}} Review(s)</a></span>
                                                    </div>
                                            
                                                   
                                                @if($i%4==0)
                                                        </div>
                                                    @if($i == count($dssale) - 1)
                                                        </div>
                                                    @endif
                                                @elseif($i%4==3)
                                                        </div>
                                                    </div>
                                                @else
                                                        </div>
                                                     
                                                    @if($i == count($dssale) - 1)
                                                        </div>
                                                    @endif
                                                @endif
                                        @endfor
                                    @endif

                                    



                                </div>
                            </div>
                        </div>

                        


                    <div class="block">
                                <div class="owl">



                                    @php($vitri = 11)
                            @php($flag = False)
                            @for($i = 11; $i <= 12; $i++)
                                @foreach($dsqc as $qc)
                                    @if($qc->quanliquangcao['id'] == $i)
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
                                    <div class="banner-left"><a href="#"><img src='{{url("upload/quangcao/2017/10/24/mua.jpg")}}' alt="" height="300"></a>
                                        <div class="banner-content">
                                            <h1>HÃY MUA QUẢNG CÁO</h1>
                                        </div>
                                    </div>
                                @endif
                                @php($flag = False)
                            @endfor

                            </div>
                        </div>

                    </div>



                    <div class="col-sm-9 col-right">
                        



                    	<div class="product-view">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="product-img-box">
                                        <p class="product-image">
                                            <a href='{{url($sp->anhdaidien)}}' class="cloud-zoom" id="ma-zoom1">
                                                <img src='{{url($sp->anhdaidien)}}' alt="Fusce aliquam" title="Fusce aliquam" />
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="product-shop col-sm-7">
                                    <div class="product-name">
                                        <h1>{{$sp->ten}}</h1>
                                    </div>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:67%" class="rating"></div>
                                        </div>
                                        <span class="amount"><a href="#">{{number_format($sp->luotxem)}} Review(s)</a></span>
                                    </div>
                                    <div class="box-container2"> 
                                        <div class="price-box">
                                        	@if($sp->khuyenmai > 0)
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                            <span id="product-price-1" class="price">{{number_format($sp->dongia-(($sp->dongia*$sp->khuyenmai)/100))}}</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price-label">Regular Price:</span>
                                                <span id="old-price-1" class="price">{{number_format($sp->dongia)}}</span>
                                            </p>
                                            @else
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                            <span id="product-price-1" class="price">{{number_format($sp->dongia)}}</span>
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="short-description">
                                    	{{$sp->mota}}
                                    </div>
                                    <p class="availability in-stock">Availability: <span>
                                        @php ($soluong = $sp->soluong)
                                    	@if($soluong > 0)
                                    	    Còn hàng
                                    	@else
                                    		Hết hàng
                                    	@endif
                                    </span></p>
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-3 control-label">Quantity:</label>
                                            <div class="col-md-3 col-sm-5">
                                                <div class="input-group qty">
                                                    <span class="input-group-btn">
                                                        <button class="btn" id="btndownSL" type="button">-</button>
                                                    </span>
                                                    <input type="text" id="soluong" class="form-control soluong" value="1">
                                                    <span class="input-group-btn">
                                                        <button class="btn" id="btnupSL" type="button">+</button>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </div>
                                        </div>
                                        @if($sp->soluong > 0)
                                        <button type="submit" data-id='{{$sp->id}}' class="btn btn-danger btn-cart link-cart">Add to cart</button>
                                        @endif
                                    </form>
                                </div><!-- /.product-shop -->
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    {!! $sp->noidung !!}
                                </div>
                            </div>

                        
                        </div><!-- /.product-view -->
                        <div class="title-group3">
                                <h3>Comments ({{$sp->binhluan()->count()}})</h3>
                        </div>
                        <!-- <div class="comment-list">

                        		@foreach($sp->binhluan()->get() as $bl)

                                <div class="comment-item">
                                    <div class="media">
                                        <div class="media-left"><a href="#"><img src='{{url("upload/avatar/2017/10/24/avatar-03.jpg")}}' alt="" width="50"></a></div>
                                        <div class="media-body overflow-body">
                                            <div class="dropdown">
                                                <i class="fa fa-chevron-down" data-toggle="dropdown" aria-expanded="true"></i>
                                                <ul class="dropdown-menu dropdown-menu-right" style="margin-top: 20px; border: #d8d8d8 1px solid;" >
                                                    <li><a href="#edit-products-comments" data-toggle="tab">Edit</a></li>
                                                    <li><a href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                            <i class="fa fa-reply">&nbsp;Reply</i>
                                            <div class="comment-date">{{$bl->created_at}}</div>
                                            <div class="comment-title">{{$bl->khachhang['ten']}}</div>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="products-comments">
                                                    {{$bl->noidung}}
                                                </div>
                                                <div class="form-group tab-pane" id="edit-products-comments">
                                                    <textarea class="form-control" style="margin-bottom: 10px;" placeholder="Your comment" rows="5"></textarea>
                                                    <button type="submit" class="btn btn-default btn-sm" style="float: right;">Cancel</button>
                                                    <button type="submit" class="btn btn-default btn-sm" style="float: right;margin-right: 10px;">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                   <!--  <div class="comment-reply">
                                        <div class="media">
                                            <div class="media-left"><a href="#"><img src="images/avatar/avatar-04.jpg" alt=""></a></div>
                                            <div class="media-body overflow-body">
                                            <div class="dropdown">
                                                <i class="fa fa-chevron-down" data-toggle="dropdown" aria-expanded="true"></i>
                                                <ul class="dropdown-menu dropdown-menu-right" style="margin-top: 20px; border: #d8d8d8 1px solid;" >
                                                    <li><a href="#edit-products-comments" data-toggle="tab">Edit</a></li>
                                                    <li><a href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                            <i class="fa fa-reply">&nbsp;Reply</i>
                                            <div class="comment-date">12.5/2104</div>
                                            <div class="comment-title">Section 1.10.33 of "de Finibus Bonorum et Malorum"</div>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="products-comments">
                                                    Từ bao lâu nay anh cứ mãi cô đơn bơ vơ Bao lâu rồi ai đâu hay Ngày cứ thế trôi qua miên man Riêng anh một mình nơi đây Những phút giây trôi qua tầm tay Chờ một ai đó 
                                                </div>
                                                <div class="form-group tab-pane" id="edit-products-comments">
                                                    <textarea class="form-control" style="margin-bottom: 10px;" placeholder="Your comment" rows="5"></textarea>
                                                    <button type="submit" class="btn btn-default btn-sm" style="float: right;">Cancel</button>
                                                    <button type="submit" class="btn btn-default btn-sm" style="float: right;margin-right: 10px;">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div> -->
                               <!--  </div>

                                @endforeach
       
                        </div> -->
                        <div>
                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="2"></div> 
                        </div>
                        <!-- <br>
                            <div class="title-group3">
                                <h3>Leave a reply</h3>
                            </div>
                            <form method="post" action='{{url("/comment.html")}}'>
                                {{csrf_field()}}

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Your comment" rows="5" name="noidung"></textarea>
                                    </div>
                                </div>
                            </div>
                     


                            <input type="hidden" name="id_kh" value="{{Auth::user()['id']}}">
                            <input type="hidden" name="id_sp" value="{{$sp->id}}">
                            <button type="submit" class="btn btn-default btn-lg">Gửi Bình Luận</button>
                            </form>
                        <br>     -->

                        <div class="featuredproductslider-container"> 
                            <div class="title-group1"><h2>SẢN PHẨM CÙNG LOẠI</h2></div>
                            <div id="featured-products" class="owl-container">
                                <div class="owl">


                                	@if($dssp)
                                	@foreach($dssp as $sp)
                                    <div class='productslider-item item'>
                                        <div class="item-inner">
                                            <div class="images-container">
                                                <div class="product_icon">
                                                    <div class='new-icon'><span>new</span></div>
                                                    @if($sp->khuyenmai > 0)
                                                    <div class='sale-icon'><span>sale</span></div>
                                                    @endif
                                                </div>
                                                <a href='{{route("sanpham",["sp"=>$sp->id."-".$sp->slug])}}' title="Nunc facilisis" class="product-image">
                                                    <img src='{{url($sp->anhdaidien)}}' alt="Nunc facilisis" />
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
                                                        <span class="price-label">Special Price</span>
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
                                    @endif

                                </div>
                            </div>
                        </div><!-- /.featuredproductslider-container -->









                    
                    </div><!-- /.col-right -->
                </div>
            </div>
        </div><!-- /.main -->
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}'></script>
	<script type="text/javascript">
    $('#btnupSL').click(function(){
        if($('#soluong').val() < {{$soluong}}){
            $val = (parseInt($('#soluong').val()) + 1);
            $('#soluong').val($val);
        }
    });
    $('#btndownSL').click(function(){
        if($('#soluong').val() > 0){
            $val = (parseInt($('#soluong').val()) - 1);
            $('#soluong').val($val);
        }
    });

    </script>
@endsection