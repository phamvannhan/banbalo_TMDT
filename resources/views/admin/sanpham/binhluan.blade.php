@extends('admin.layouts.master')

@section('title','Bình luận')

@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bình Luận</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/bl/danhsach.html')}}">Tải lại</a>
                    <a class="btn btn-danger dellist" href="">Xóa</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Bình Luận
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	@if(!empty($dsbl))
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" /></th>
                                        <th>ID</th>
                                        <th>KHÁCH HÀNG</th>
                                        <th>NỘI DUNG</th>
                                        <th>NGÀY TẠO</th>
                                        <th colspan="2">CÔNG CỤ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($dsbl as $bl)
                                    <tr class="odd gradeX">
                                        <td><input type="checkbox" value="{{$bl->id}}" /></td>
                                        <td>{{$bl->id}}</td>
                                        <td>{{$bl->khachhang['ten']}}</td>
                                        <td>{{$bl->noidung}}</td>
                                        <td>{{$bl->created_at}}</td>
                                        <td><a class="btn btn-danger btndel" data-id="{{$bl->id}}">Xóa</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            	<p>Hiện chưa có bình luận nào</p>
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
                    {{$dsbl->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

        $url = "{!! url('admin/bl/xoa.html') !!}";
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