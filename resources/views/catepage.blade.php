@extends('layouts.master')

@section('title', $tenloai)

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
                                                <div class="banner-left"><a href="#"><img src='{{url("upload/quangcao/2017/10/24/mua.jpg")}}' height="300" alt=""></a>
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
                 

                        <div class="page-title">
                            <h1>{{$tenloai}}</h1>
                        </div>
                        <div class="toolbar">
                            <div class="sorter">
                                <p class="view-mode">
                                    <label>View as:</label>
                                    <strong class="grid" title="Grid">Grid</strong>&nbsp;
                                    <a class="list" title="List" href="#">List</a>&nbsp;
                                </p>
                            </div>
                            <div class="pager">
                                <div class="sort-by hidden-xs">
                                    <label>Sort By:</label>
                                    <select class="form-control input-sm">
                                        <option selected="selected">Position</option>
                                        <option>Name</option>
                                        <option>Price</option>
                                    </select>
                                    <a title="Set Descending Direction" href="#"><span class="fa fa-sort-amount-desc"></span></a>
                                </div>
                                <div class="limiter hidden-xs">
                                    <label>Show:</label>
                                    <div class="limiter-inner">
                                        <select class="form-control input-sm">
                                            <option>9</option>
                                            <option selected="selected">12</option>
                                            <option>24</option>
                                            <option>36</option>
                                        </select> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row products">
                                @if($dssp)
                            	@foreach($dssp as $sp)
                            		<div class="col-md-3 col-sm-6">
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
	                                                 <img src='{{url($sp->anhdaidien)}}' alt="Primis in faucibus" />
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
	                                                    <span class="price">{{number_format($sp->dongia - (($sp->dongia*$sp->khuyenmai)/100))}} VNĐ</span>
	                                                </p>
	                                                <p class="old-price">
	                                                    <span class="price-label">Regular Price: </span>
	                                                    <span class="price">{{number_format($sp->dongia)}} VNĐ</span>
	                                                </p>
	                                                @else
	                                                <p class="special-price">
	                                                    <span class="price-label">Special Price: </span>
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
	                                </div>
	                            @endforeach
	                            @endif
                            
                           
                        </div> 
                    
                    </div>
                </div>
            </div>
        </div><!-- /.main -->
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}'></script>
@endsection