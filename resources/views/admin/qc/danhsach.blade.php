@extends('admin.layouts.master')

@section('title','Danh Sách Quảng Cáo')

@section('content')
 <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Quảng Cáo</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6">
                    <div class="page-header">
                        <form method="get" action='{{url("admin/qc/timkiem.html")}}'>
                            <input type="text"  placeholder="Tìm kiếm theo mã, tên khách hàng, loại..." name="txtSearch" size="50">
                            <button type="submit">Tìm</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/qlqc/danhsach.html')}}">Trở về</a>
                    <a class="btn btn-outline btn-default" href="{{url('admin/qc/danhsach.html')}}">Tải lại</a>
                    <a class="btn btn-danger dellist" href="">Xóa</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Mua Quảng Cáo
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" /></th>
                                        <th>ID</th>
                                        <th>HÌNH</th>
                                        <th>HREF</th>
                                        <th>MÔ TẢ</th>
                                        <th>KHÁCH HÀNG</th>
                                        <th>LOẠI QUẢNG CÁO</th>
                                        <th>NGÀY MUA</th>
                                        <th colspan="2">CÔNG CỤ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dsqc as $qc)
                                        <tr class="odd gradeX">
                                            <td><input type="checkbox" value="{{$qc->id}}" /></td>
                                            <td>{{$qc->id}}</td>
                                            <td>{{$qc->hinh}}</td>
                                            <td>{{$qc->href}}</td>
                                            <td>{{$qc->mota}}</td>
                                            <td>{{$qc->khachhang['ten']}}</td>
                                            <td>{{$qc->quanliquangcao['id']}}</td>
                                            <td>{{$qc->created_at}}</td>
                                            <td ><a class="btn btn-info" href='{{url("admin/qc/$qc->id/sua.html")}}'>Sửa</a></td>
                                        <td ><a class="btn btn-danger btndel" data-id="{{$qc->id}}" >Xóa</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                     
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="text-center"> 
                    {{$dsqc->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

        $url = "{!! url('admin/qc/xoa.html') !!}";
        $('.btndel').click(function(){
            $id = $(this).attr('data-id');
            getXoa($url,$id,'1');
        });
        $('.dellist').click(function(){
            $id = [];
            $('input[type=checkbox]:checkbox:checked').each(function(i){
                $id[i] = $(this).val();
            });
            if($id.length <= 0){
                alert("Vui lòng chọn ít nhất 1");
            }else{
                getXoa($url,$id,'0');
            }
        });
    </script>
@endsection