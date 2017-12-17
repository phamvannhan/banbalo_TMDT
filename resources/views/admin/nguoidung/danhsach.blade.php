@extends('admin.layouts.master')

@section('title','Danh Sách Người Dùng')

@section('content')
 <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Nhân viên</h1>
                </div>
                <div class="col-lg-6">
                    <div class="page-header">
                        <form method="get" action='{{url("admin/nd/timkiem.html")}}'>
                            <input type="text"  placeholder="Tìm kiếm theo..." name="txtSearch" size="50">
                            <button type="submit">Tìm</button>
                        </form>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/nd/them.html')}}">Thêm</a>
                    <a class="btn btn-outline btn-default" href="{{url('admin/nd/danhsach.html')}}">Tải lại</a>
                    <button type="button" class="btn btn-success activelist">Mở</button>
                    <button type="button" class="btn btn-warning unactivelist">Cấm</button>
                    <button type="button" class="btn btn-danger dellist">Xóa</button>
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
                            @if(!empty($dsnd))
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" /></th>
                                            <th>ID</th>
                                            <th>USERNAME</th>
                                            <th>TÊN</th>
                                            <th>CHỨC VỤ</th>
                                            <th>ĐỊA CHỈ</th>
                                            <th>SỐ ĐIỆN THOẠI</th>
                                            <th>MAIL</th>
                                            <th>TRẠNG THÁI</th>
                                            <th>NGÀY TẠO</th>
                                            <th colspan="4" class="text-center">CÔNG CỤ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dsnd as $nd)
                                        @if($nd->trangthai == 0)
                                        <tr class="odd gradeX alert alert-danger" >
                                        @else
                                        <tr class="odd gradeX" >
                                        @endif
                                            <td><input type="checkbox" value="{{$nd->id}}" /></td>
                                            <td>{{$nd->id}}</td>
                                            <td>{{$nd->username}}</td>
                                            <td>{{$nd->ten}}</td>
                                            <td>
                                                @if($nd->chucvu == 1)
                                                    Admin
                                                @elseif($nd->chucvu == 2)
                                                    Nhân viên kho
                                                @elseif($nd->chucvu == 0)
                                                    Nhân viên CSKH
                                                @endif
                                            </td>
                                            <td>{{$nd->diachi}}</td>
                                            <td >{{$nd->sdt1}}, {{$nd->sdt2}}, {{$nd->sdt3}}</td>
                                            <td>{{$nd->mail}}</td>
                                            <td>
                                                @if($nd->trangthai == 1)
                                                    Hoạt động
                                                @else
                                                    Không hoạt động
                                                @endif
                                            </td>
                                            <td>{{$nd->created_at}}</td>
                                            <td><a class="btn btn-warning btnunactive" data-id="{{$nd->id}}">Cấm</a></td>
                                            <td><a class="btn btn-success btnactive" data-id="{{$nd->id}}">Mở</a></td>
                                             <td><a class="btn btn-info" href='{{url("admin/nd/$nd->id/sua.html")}}'>Sửa</a></td>
                                            <td><a class="btn btn-danger btndel" data-id="{{$nd->id}}" >Xóa</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Hiện chưa có người dùng nào</p>
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
                    {{$dsnd->links()}}
                </div>
            </div>
@endsection

@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">
        $url = "{!! url('admin/nd/xoa.html') !!}";
        $url_stt = "{!! url('admin/nd/trangthai.html') !!}";

        function getIdBox($id){
            $('input[type=checkbox]:checkbox:checked').each(function(i){
                $id[i] = $(this).val();
            });
        };

        $('.btndel').click(function(){
            $id = $(this).attr('data-id');
            getXoa($url,$id,'1');
        });

        $('.dellist').click(function(){
            $id = [];
            getIdBox($id);
            if($id.length <= 0){
                alert("Vui lòng chọn ít nhất 1");
            }else{
                getXoa($url,$id,'0');
            }
        });

        function editStt($stt){
            $.get($url_stt,{id:$id,type:'nd',stt:$stt},function(data){
                alert(data);
                location.reload();
            });
        }

       

        $('.btnactive').click(function(){
            $id = $(this).attr('data-id');
            //editStatus($url_stt,$id,'nd',1);
            editStt(1);
        });

        $('.btnunactive').click(function(){
            $id = $(this).attr('data-id');
            //editStatus($url_stt,$id,'nd',0);
            editStt(0);
        });

        $('.activelist').click(function(){
            $id = [];
            getIdBox($id);
            //editStatus($url_stt,$id,'nd',1);
            editStt(1);
        });

        $('.unactivelist').click(function(){
            $id = [];
            getIdBox($id);
            //editStatus($url_stt,$id,'nd',0);
            editStt(0);
        });

    </script>
@endsection