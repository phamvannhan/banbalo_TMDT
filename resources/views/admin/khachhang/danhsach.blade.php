@extends('admin.layouts.master')

@section('title','Danh Sách Khách Hàng')

@section('content')
<div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Khách Hàng</h1>
                </div>
                <div class="col-lg-6">
                    <div class="page-header">
                        <form method="get" action='{{url("admin/kh/timkiem.html")}}'>
                            <input type="text"  placeholder="Tìm kiếm theo mã, username, ten, địa chỉ...." name="txtSearch" size="50">
                            <button type="submit">Tìm</button>
                        </form>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/kh/danhsach.html')}}">Tải lại</a>
                    <a class="btn btn-danger dellist" href="">Xóa</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Nhân Viên
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	@if(!empty($dskh))
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th ><input type="checkbox" /></th>
                                        <th  >ID</th>
                                        <th >USERNAME</th>
                                        <th >TÊN</th>
                                        <th >ĐỊA CHỈ</th>
                                        <th >SỐ ĐIỆN THOẠI</th>
                                        <th >MAIL</th>
                                        <th >NGÀY TẠO</th>
                                        <th  colspan="2">CÔNG CỤ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($dskh as $kh)
	                                    <tr class="odd gradeX">
	                                        <td ><input type="checkbox" value="{{$kh->id}}" /></td>
	                                        <td >{{$kh->id}}</td>
	                                        <td >{{$kh->username}}</td>
	                                        <td >{{$kh->ten}}</td>
	                                        <td >{{$kh->diachi}}</td>
	                                        <td >{{$kh->sodienthoai}}</td>
	                                        <td >{{$kh->mail}}</td>
	                                        <td >{{$kh->created_at}}</td>
	                                        <td><a class="btn btn-danger btndel" data-id="{{$kh->id}}" >Xóa</a></td>
	                                    </tr>
	                                @endforeach       
                                </tbody>
                            </table>
                            @else
                            	<p>Hiện chưa có khách hàng nào</p>
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
                    {{$dskh->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

        $url = "{!! url('admin/kh/xoa.html') !!}";
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