@extends('admin.layouts.master')

@section('title','Danh Sách Sản Phẩm')

@section('content')
 <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Sản Phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6">
                    <div class="page-header">
                        <form method="get" action='{{url("admin/sp/timkiem.html")}}'>
                            <input type="text"  placeholder="Tìm kiếm theo mã, tên, đơn giá...." name="txtSearch" size="50">
                            <button type="submit">Tìm</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn btn-outline btn-default" href="{{url('admin/sp/them.html')}}">Thêm</a>
                    <a class="btn btn-outline btn-default" href="{{url('admin/sp/danhsach.html')}}">Tải lại</a>
                    <a class="btn btn-danger dellist" href="">Xóa</a>
                </div>
                <div class="col-log-6">
                    <input type="checkbox"  value="all" id="salebox"> Tất cả
                    <input type="number" placeholder="phần trăm sale..." id="saletxt"> (%)
                    <a class="btn btn-primary" href="" id="btnsale">Sale</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Sản Phẩm
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	@if(!empty($dssp))
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th ><input type="checkbox" /></th>
                                        <th >ID</th>
                                        <th >TÊN SẢN PHẨM</th>
                                        <th >ẢNH ĐẠI DIỆN</th>
                                        <th >TÁC GIẢ</th>
                                        <th >ĐƠN GIÁ</th>
                                        <th >KHUYẾN MÃI (%)</th>
                                        <th >SỐ LƯỢNG</th>
                                        <th >LOẠI</th>
                                        <th >NHÀ CUNG CẤP</th>
                                        <th >TRẠNG THÁI</th>
                                        <th >NGÀY TẠO</th>
                                        <th colspan="4" >CÔNG CỤ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($dssp as $sp)
                                	<tr class="odd gradeX">
                                        <td ><input type="checkbox" value="{{$sp->id}}" /></td>
                                        <td >{{$sp->id}}</td>
                                        <td >{{$sp->ten}}</td>
                                        <td ><img src='{{url($sp->anhdaidien)}}' width="50"></td>
                                        <td >{{$sp->nguoidung['ten']}}</td>
                                        <td >{{$sp->dongia}}</td>
                                        <td >{{$sp->khuyenmai}}</td>
                                        <td >{{$sp->soluong}}</td>
                                        <td >{{$sp->loaisanpham['ten']}}</td>
                                        <td >{{$sp->nhacungcap['ten']}}</td>
                                        <td >
                                             @if($sp->trangthai == 1)
                                                    Hoạt động
                                                @else
                                                    Ẩn
                                                @endif
                                        </td>
                                        <td >{{$sp->created_at}}</td>
                                        <td ><a class="btn btn-primary" href='{{url("admin/sp/$sp->id/binhluan.html")}}' >Bình luận</a></td>
                                        <td ><a class="btn btn-default" data-id="{{$sp->id}}" href='{{url("admin/sp/$sp->id/anh.html")}}' >Ảnh</a></td>
                                        <td ><a class="btn btn-info" href='{{url("admin/sp/$sp->id/sua.html")}}'>Sửa</a></td>
                                        <td ><a class="btn btn-danger btndel" data-id="{{$sp->id}}" >Xóa</a></td>
                                    </tr>
                                	@endforeach
                                   
                                     
                                </tbody>
                            </table>
                            @else
                            	<p>Hiện chưa có sản phẩm nào</p>
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
                    {{$dssp->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

        $url = "{!! url('admin/sp/xoa.html') !!}";
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

        $('#btnsale').click(function(){
            if($('#saletxt').val() == ''){
                alert("Vui lòng nhập giá trị % sale");
                return false;
            }
            if($('#salebox').prop("checked") == true){
                getSale('{{url("admin/sp/sale.html")}}',0,$('#saletxt').val());
            }else{
                $id = [];
                $('input[type=checkbox]:checkbox:checked').each(function(i){
                    $id[i] = $(this).val();
                });

                if($id.length <= 0){
                    alert("Vui lòng chọn ít nhất 1 sản phẩm");
                    return false;
                }else{
                    getSale('{{url("admin/sp/sale.html")}}',1,$('#saletxt').val(),$id);
                }
            }
        });

    </script>
@endsection