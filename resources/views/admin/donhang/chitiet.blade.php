@extends('admin.layouts.master')

@section('title','Chi Tiết Đơn Hàng')

@section('content')
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">CHI TIẾT ĐƠN HÀNG</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/dh/danhsach.html')}}">Trở về</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chi Tiết Đơn Hàng
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @if(!empty($dsctdh))
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                <thead>
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>ID-ĐƠNHÀNG</th>
                                        <th>TÊN SẢN PHẨM</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>ĐƠN GIÁ</th>
                                        <th>NGÀY TẠO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dsctdh as $ctdh)
                                    <tr class="odd gradeX">
                                        <td>{{$ctdh->id}}</td>
                                        <td>{{$ctdh->id_dh}}</td>
                                        <td>{{$ctdh->sanpham['ten']}}</td>
                                        <td>{{$ctdh->soluong}}</td>
                                        <td>{{$ctdh->dongia}}</td>
                                        <td>{{$ctdh->created_at}}</td>
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
                    {{$dsctdh->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

    </script>
@endsection