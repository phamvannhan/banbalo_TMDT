@extends('admin.layouts.master')

@section('title','Danh Sách Loại Sản Phẩm')

@section('content')
<div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Loại Sản Phẩm</h1>
                </div>
                <div class="col-lg-6">
                    <div class="page-header">
                        <form method="get" action='{{url("admin/lsp/timkiem.html")}}'>
                            <input type="text"  placeholder="Tìm kiếm theo mã, tên, tên chuyên mục...." name="txtSearch" size="50">
                            <button type="submit">Tìm</button>
                        </form>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                   <a class="btn btn-outline btn-default" href="{{url('admin/lsp/them.html')}}">Thêm</a>
                    <a class="btn btn-outline btn-default" href="{{url('admin/lsp/danhsach.html')}}">Tải lại</a>
                    <a class="btn btn-danger dellist" href="">Xóa</a>
                </div>
            </div>
            <hr>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Loại Sản Phẩm
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @if(!empty($dsloai))
                            <table width="100%" class="table table-striped table-bordered table-hover text-center" id="dataTables-example" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th ><input type="checkbox" /></th>
                                        <th >ID</th>
                                        <th >TÊN LOẠI SẢN PHẨM</th>
                                        <th >VỊ TRÍ</th>
                                        <th >CHUYÊN MỤC</th>
                                        <th >NGÀY TẠO</th>
                                        <th colspan="2" >CÔNG CỤ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($dsloai as $loai)
                                        <tr class="odd gradeX">
                                            <td><input type="checkbox" value="{{$loai->id}}" /></td>
                                            <td>{{$loai->id}}</td>
                                            <td>{{$loai->ten}}</td>
                                            <td>{{$loai->vitri}}</td>
                                            <td>{{$loai->chuyenmuc['ten']}}</td>
                                            <td>{{$loai->created_at}}</td>
                                            <td><a class="btn btn-info" href='{{url("admin/lsp/$loai->id/sua.html")}}'>Sửa</a></td>
                                            <td><a class="btn btn-danger btndel" data-id="{{$loai->id}}" >Xóa</a></td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>Hiện chưa có loại sản phẩm nào</p>
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
                    {{$dsloai->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">
        $url = "{!! url('admin/lsp/xoa.html') !!}";
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