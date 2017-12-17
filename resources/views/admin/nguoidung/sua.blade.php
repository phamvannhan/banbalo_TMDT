@extends('admin.layouts.master')

@section('title','Sửa Người Dùng')

@section('content')
	 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nhân Viên</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                   <a class="btn btn-outline btn-default" href="{{url('admin/nd/danhsach.html')}}">Trở về</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sửa Nhân Viên
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" method="post" action='{{url("admin/nd/$nd->id/sua.html")}}'>
                            {{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" value="{{$nd->username}}" type="text" placeholder="Nhập username...">
                                        </div>
                                        <div class="form-group">
                                            <label>Chức vụ</label>
                                            <select name="chucvu" class="form-control">
                                            @if($nd->chucvu == 1)
                                               <option value="1" selected="selected">Admin</option>
                                            @else
                                                <option value="1">Admin</option>
                                            @endif
                                            @if($nd->chucvu == 2)
                                               <option value="2" selected="selected">Nhân viên kho</option>
                                            @else
                                                <option value="2">Nhân viên kho</option>
                                            @endif
                                            @if($nd->chucvu == 0)
                                               <option value="0" selected="selected">Nhân viên CSKH</option>
                                            @else
                                                <option value="0">Nhân viên CSKH</option>
                                            @endif
                                    
                                            </select>
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                                        <button type="reset" class="btn btn-default">Làm lại</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                            @if(session('thongbao'))
                                                <p class="alert alert-danger">{{ session('thongbao') }}</p>
                                            @endif
                                            @if(count($errors) > 0)
                                                @foreach($errors->all() as $err)
                                                    <p class="alert alert-danger">{{ $err }}</p>
                                                @endforeach
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@endsection
@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

    </script>
@endsection