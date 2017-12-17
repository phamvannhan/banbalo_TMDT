@extends('admin.layouts.master')

@section('title','Quản Lí Quảng Cáo')

@section('content')
  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản Lí Quảng Cáo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/qlqc/danhsach.html')}}">Tải lại</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Các Loại Quảng Cáo
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @if(!empty($dsqlqc))
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>GIÁ</th>
                                            <th>VỊ TRÍ</th>
                                            <th>THỜI GIAN</th>
                                            <th>NGÀY TẠO</th>
                                            <th colspan="2">CÔNG CỤ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dsqlqc as $qlqc)
                                        <tr class="odd gradeX">
                                            <td>{{$qlqc->id}}</td>
                                            <td>{{$qlqc->gia}}</td>
                                            <td>
                                                @if($qlqc->vitri == 123)
                                                    Trang Chủ, Chuyên Mục, Chi Tiết
                                                @elseif($qlqc->vitri == 1)
                                                    Trang Chủ
                                                @endif
                                            </td>
                                            <td>{{$qlqc->thoigian}}</td>
                                            <td>{{$qlqc->created_at}}</td>
                                            <td ><a class="btn btn-primary" href='{{url("admin/qlqc/$qlqc->id/chitiet.html")}}'>Chi Tiết</a></td>
                                            <td ><a class="btn btn-info" href='{{url("admin/qlqc/$qlqc->id/sua.html")}}'>Sửa</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Hiện chưa có quảng cáo nào</p>
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
                    {{$dsqlqc->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

    </script>
@endsection