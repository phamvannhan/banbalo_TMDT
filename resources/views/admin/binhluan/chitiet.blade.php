@extends('admin.layouts.master')

@section('title','Chi Tiết Bình luận')

@section('content')
<div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Chi Tiết Bình Luận</h1>
                </div>
                <div class="col-lg-6">
                    <div class="page-header">
                        
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/bl/danhsach.html')}}">Tải lại</a>
                    <a class="btn btn-outline btn-default" href="{{url('admin/bl/danhsach.html')}}">Trở Về</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thông Tin
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<div class="row">
                                <div class="col-lg-12">
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
                                    
                                </div><!-- /.product-shop -->
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    {!! $sp->noidung !!}
                                </div>
                            </div>

                        
                        </div><!-- /.product-view -->
                                </div>
                            </div>
                            <div class="page-header"></div>

                            

                            @foreach($sp->binhluan()->get() as $bl)
                            @if($bl->id_parent == null)
                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <div class="row"><spa style="font-size: 20px; color: blue;">{{$bl->khachhang['ten']}}</spa></div>
                                    <div class="row">{{$bl->noidung}}</div>
                                </div>
                            </div>

                            <div class="page-header"></div>
                            @endif
                            @endforeach


                            <div class="row">
                                <form method="post" action="">
                                    {{csrf_field()}}
                                <div class="col-lg-12">
                                     <div class="form-group">
                                        <textarea class="form-control" placeholder="Your comment" rows="5" name="noidung"></textarea>
                                    </div>
                                    <input type="hidden" name="id_kh" value="{{Auth::user()['id']}}">
                                    <input type="hidden" name="id_sp" value="{{$sp->id}}">
                                    <button type="submit" class="btn btn-default btn-lg">Gửi Bình Luận</button>
                                </div>
                                </form>
                            </div>
                        </div>                     
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="text-center"> 
       
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

    
    </script>
@endsection