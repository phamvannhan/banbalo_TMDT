@extends('admin.layouts.master')

@section('title','Danh Sách Chi Tiết Phiếu Nhập')

@section('content')
    <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">CHI TIẾT PHIẾU NHẬP</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6">
                    <div class="page-header">
                        <form method="get" action='{{url("admin/ctpn/timkiem.html")}}'>
                            <input type="text"  placeholder="Tìm kiếm theo mã, giá, mã phiếu nhập...." name="txtSearch" size="50">
                            <button type="submit">Tìm</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/ctpn/danhsach.html')}}">Tải lại</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Chi Tiết Phiếu Nhập
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @if(!empty($dsctpn))
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                <thead>
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>ID-PHIẾUNHẬP</th>
                                        <th>TÊN SẢN PHẨM</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>GIÁ NHẬP</th>
                                        <th>NGÀY TẠO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dsctpn as $ctpn)
                                    <tr class="odd gradeX">
                                    	<td>{{$ctpn->id}}</td>
                                    	<td>{{$ctpn->id_pn}}</td>
                                    	<td>{{$ctpn->sanpham['ten']}}</td>
                                        <td>{{$ctpn->soluong}}</td>
                                        <td>{{$ctpn->gianhap}}</td>
                                        <td>{{$ctpn->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>Hiện chưa có đơn hàng nào</p>
                            @endif
                        </div>                     
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="text-center"> 
                    {{$dsctpn->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

    </script>
@endsection