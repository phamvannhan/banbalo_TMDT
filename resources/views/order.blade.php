@extends('layouts.master')

@section('title','Lịch sử đơn hàng')

@section('content')
<div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <h1>Lịch Sử Đơn Hàng</h1>
                        </div>
                        <div style="margin: 0 0 30px;"></div>
                        <div class="page-title">
                        @if($dsdh)
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Mã hóa đơn</th>
                                    <th>Tổng Gía (VNĐ)</th>
                                    <th>Ngày Đặt</th>
                                    <th>Địa Chỉ Nhận Hàng</th>
                                    <th>Trạng Thái</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($dsdh as $dh)
                                  <tr>
                                    <td>{{$dh->id}}</td>
                                    <td>{{number_format($dh->tonggia)}}</td>
                                    <td>{{$dh->created_at}}</td>
                                    <td>{{$dh->dchigiaohang}}</td>
                                    <td>
                                        @if($dh->trangthai == 1)
                                            Đang giao hàng
                                        @elseif($dh->trangthai == 2)
                                            Đã nhận hàng
                                        @else
                                            Đang chờ xác nhận
                                        @endif
                                    </td>
                                    <td>
                                        <a href='{{url("$dh->id-orderdetail.html")}}'>Chi tiết</a>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Không có đơn hàng nào</p>
                        @endif
                        </div>
                   </div>
                </div>
            </div>
        </div><!-- /.main -->
@endsection