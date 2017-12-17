@extends('admin.layouts.master')

@section('title','Danh Sách Slide')

@section('content')
 <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Slide</h1>
                </div>
                <div class="col-lg-6">
                    <div class="page-header">
                        <form method="get" action='{{url("admin/sli/timkiem.html")}}'>
                            <input type="text"  placeholder="Tìm kiếm theo mã..." name="txtSearch" size="50">
                            <button type="submit">Tìm</button>
                        </form>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/sli/them.html')}}">Thêm</a>
                    <a class="btn btn-outline btn-default" href="{{url('admin/sli/danhsach.html')}}">Tải lại</a>
                    <a class="btn btn-danger dellist dellist" href="">Xóa</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Slide
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @if(!empty($dssli))
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th ><input type="checkbox" /></th>
                                        <th >ID</th>
                                        <th >ẢNH</th>
                                        <th >HREF</th>
                                        <th >NGÀY TẠO</th>
                                        <th colspan="2" >CÔNG CỤ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($dssli as $sli)
                                        <tr class="odd gradeX">
                                            <td ><input type="checkbox" value="{{$sli->id}}" /></td>
                                            <td >{{$sli->id}}</td>
                                            <td ><img src='{{url($sli->anh)}}' width="80"></td>
                                            <td >{{$sli->href}}</td>
                                            <td >{{$sli->created_at}}</td>
                                            <td><a class="btn btn-info" href='{{url("admin/sli/$sli->id/sua.html")}}'>Sửa</a</td>
                                            <td><a class="btn btn-danger btndel" data-id="{{$sli->id}}" >Xóa</a></td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>Hiện chưa có slide nào</p>
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
                    {{$dssli->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">
       $url = "{!! url('admin/sli/xoa.html') !!}";
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