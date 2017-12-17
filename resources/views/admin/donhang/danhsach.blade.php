@extends('admin.layouts.master')

@section('title','Danh Sách Đơn Hàng')

@section('content')
    <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">ĐƠN HÀNG</h1>
                </div>
                <div class="col-lg-6">
                    <div class="page-header">
                        <form method="get" action='{{url("admin/dh/timkiem.html")}}'>
                            <input type="text"  placeholder="Tìm kiếm theo mã, stripe, giá, địa chỉ...." name="txtSearch" size="50">
                            <button type="submit">Tìm</button>
                        </form>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn btn-outline btn-default" href="{{url('admin/dh/danhsach.html')}}">Tải lại</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Đơn Hàng
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @if(!empty($dsdh))
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                <thead>
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>KHÁCH HÀNG</th>
                                        <th>TỔNG GIÁ</th>
                                        <th>ĐỊA CHỈ GIAO HÀNG</th>
                                        <th>NGÀY TẠO</th>
                                        <th colspan="2" class="text-center">CÔNG CỤ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dsdh as $dh)
                                    <tr class="odd gradeX">
                                    
                                        <td>{{$dh->id}}</td>
                                        <td>{{$dh->khachhang['ten']}}</td>
                                        <td>{{$dh->tonggia}}</td>
                                        <td>{{$dh->dchigiaohang}}</td>
                                        <td>{{$dh->created_at}}</td>
                                        
                                        <td>
                                            @if($dh->trangthai == 0)
                                                <a class="btn btn-warning btnStatus" data-id="{{$dh->id}}" stt="{{$dh->trangthai}}" >Đang Chờ</a>
                                            @elseif($dh->trangthai == 1)
                                                <a class="btn btn-info btnStatus" data-id="{{$dh->id}}" stt="{{$dh->trangthai}}" >
                                                Xác Nhận</a>
                                            @elseif($dh->trangthai == 2)
                                                <a class="btn btn-success btnStatus" data-id="{{$dh->id}}" stt="{{$dh->trangthai}}" >Hoàn Tất</a>
                                            @endif
                                        </a></td>
                                        <td><a class="btn btn-primary" href='{{url("admin/dh/$dh->id/chitiet.html")}}'>Chi Tiết</a></td>
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
                    {{$dsdh->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">
        $('.btnStatus').click(function(){
            $id = $(this).attr('data-id');
            $stt = $(this).attr('stt');
            if($id << 3)
            $.get('{{url("admin/dh/changestt.html")}}',{id:$id,stt:$stt,type:'dh'},function(data){
                location.reload();
            });
        });
    </script>
@endsection