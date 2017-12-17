@extends('admin.layouts.master')

@section('title','Dashboard')

@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$num_new[0]}}</div>
                                    <div>Bình Luận Mới!</div>
                                </div>
                            </div>
                        </div>
                        <a href='{{url("admin/bl/danhsach.html")}}'>
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$num_new[1]}}</div>
                                    <div>Khách Hàng Mới!</div>
                                </div>
                            </div>
                        </div>
                        <a href='{{url("admin/kh/danhsach.html")}}'>
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$num_new[2]}}</div>
                                    <div>Đơn Hàng Mới!</div>
                                </div>
                            </div>
                        </div>
                        <a href='{{url("admin/dh/danhsach.html")}}'>
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$num_new[3]}}</div>
                                    <div>Phiếu Nhập Mới!</div>
                                </div>
                            </div>
                        </div>
                        <a href='{{url("admin/pn/danhsach.html")}}'>
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <form action='{{url("admin/tk/thongke.html")}}' method="post">
                        {{csrf_field()}}
                    <select class="form-control type" name="type">
                        <option value="doanhthu">Doanh Thu</option>
                        <option value="sanpham">Sản Phẩm</option>
                    </select>
                    <span class="theo">THEO:</span>
                    <select class="form-control time" name="time">
                        <option value="day">Ngày</option>
                        <option value="month">Tháng</option>
                        <option value="year">Năm</option>
                    </select>
                    <span class="cua">CỦA THÁNG :</span>
                    <input type="number" name="dieukien" class="form-control dieukien" >
                    <button type="submit" class="btn btn-info form-control" id="btntk">Thống kê</button>
                    </form>
                    <form method="post" action='{{url("admin/tk/xuatfile.html")}}'>
                        {{csrf_field()}}
                        @foreach($arr[0] as $noun)
                            <input type="hidden" name="noun[]" value='{{$noun}}'>
                        @endforeach
                        @foreach($arr[1] as $val)
                            <input type="hidden" name="val[]" value='{{$val}}'>
                        @endforeach
                        <input type="hidden" name="title" value='{{$title}}'>
                        <input type="hidden" name="type" value='{{$type}}'>
                        <input type="hidden" name="label" value='{{$label}}'>
                        <button class="form-control btn btn-primary" type="submit">Xuất File</button>
                    </form>
                                        </div>
                <div class="col-lg-9 col-md-6" id="ch">
                    <div class="app">
                        <center id="chart">
                            {!! $chart->html() !!}
                        </center>
                    </div>
                        {!! Charts::scripts() !!}
                        {!! $chart->script() !!}
                 </div>
            </div>
            
@endsection

@section('scripts')
	<script src='{{url("bootstrap/vendor/raphael/raphael.min.js")}}'></script>
    <script src='{{url("bootstrap/vendor/morrisjs/morris.min.js")}}'></script>
    <script src='{{url("bootstrap/data/morris-data.js")}}'></script>
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">
        
        $('.time').change(function(){
            if($(this).val() == 'year'){
                $('.dieukien').addClass('hidden');
                $('.cua').html("");
            }else{
                $('.dieukien').removeClass('hidden');
            }

            if($(this).val() == 'day'){
                $('.cua').html("CỦA THÁNG : ");
            }else if($(this).val() == 'month'){
                $('.cua').html("CỦA NĂM : ");
            }
        });

        $('#btntk').click(function(){
            if($('.dieukien').val() == '' && $('.time').val() != 'year'){
                return false;
            }
            return true;
        });




    </script>
@endsection