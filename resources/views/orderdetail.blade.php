@extends('layouts.master')

@section('title','Lịch sử chi tiết đơn hàng')

@section('content')
<div class="main">
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-12">
                        <div class="page-title">
                            <h1>Chi Tiết Đơn Hàng</h1>
                        </div>
                        <div class="page-title">
                            <div class="nav"> 
                                <div class="col-md-12">   
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Chi tiết</div>
                                        <div class="panel-body">
                                            <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th>Mã sản phẩm</th>
                                                <th>Tên Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá (VNĐ)</th>
                                                <th>Thành tiền (VNĐ)</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @if($dsctdh)
                                            @foreach($dsctdh as $ctdh)
                                              <tr>
                                                <td>{{$ctdh->id_sp}}</td>
                                                <td>{{$ctdh->sanpham['ten']}}</td>
                                                <td>{{$ctdh->soluong}}</td>
                                                <td>{{number_format($ctdh->dongia)}}</td>
                                                <td>{{number_format($ctdh->soluong*$ctdh->dongia)}}</td>                       
                                              </tr>
                                            @endforeach
                                            @endif
                                            </tbody>
                                            </table>        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nav">
                                <div class="col-sm-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Địa chỉ giao hàng</div>
                                        <div class="panel-body">
                                            {{$dsctdh[0]->donhang()->get()[0]['dchigiaohang']}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Tổng giá (VNĐ)</div>
                                        <div class="panel-body">
                                           {{number_format($dsctdh[0]->donhang()->get()[0]['tonggia'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="nav">
                                    <div class="text-right">
                                   <a href='{{url("/order.html")}}'><span class="glyphicon glyphicon-menu-left"></span>Quay lại</a>
             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.main -->
        
@endsection