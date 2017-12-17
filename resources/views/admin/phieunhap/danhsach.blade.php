@extends('admin.layouts.master')

@section('title','Danh Sách Phiếu Nhập')

@section('content')
 <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Phiếu Nhập</h1>
                </div>
                <div class="col-lg-6">
                    <div class="page-header">
                        <form method="get" action='{{url("admin/pn/timkiem.html")}}'>
                            <input type="text"  placeholder="Tìm kiếm theo mã, nhà cung cấp, giá..." name="txtSearch" size="50">
                            <button type="submit">Tìm</button>
                        </form>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                     <a class="btn btn-outline btn-default" href="{{url('admin/pn/them.html')}}">Thêm</a>
                    <a class="btn btn-outline btn-default" href="{{url('admin/pn/danhsach.html')}}">Tải lại</a>
                    <a class="btn btn-danger dellist" href="">Xóa</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Phiếu Nhập
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @if(!empty($dspn))
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" /></th>
                                        <th>ID</th>
                                        <th>NHÀ CUNG CẤP</th>
                                        <th>TỔNG GIÁ</th>
                                        <th>NGÀY ĐẶT</th>
                                        <th>NGÀY TẠO</th>
                                        <th colspan="2" class="text-center">CÔNG CỤ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dspn as $pn)
                                    <tr class="odd gradeX">
                                        <td><input type="checkbox" value="{{$pn->id}}" /></td>
                                        <td>{{$pn->id}}</td>
                                        <td>{{$pn->nhacungcap['ten']}}</td>
                                        <td>{{$pn->tonggia}}</td>
                                        <td>{{$pn->ngaydat}}</td>
                                        <td>{{$pn->created_at}}</td>
                                         <td ><a href='{{url("admin/pn/$pn->id/chitiet.html")}}'  class="btn btn-success"  >Chi Tiết</a></td>
                                        <td ><a class="btn btn-danger btndel" data-id="{{$pn->id}}" >Xóa</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>Hiện chưa có phiếu nhập</p>
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
                    {{$dspn->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

        $url = "{!! url('admin/pn/xoa.html') !!}";
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