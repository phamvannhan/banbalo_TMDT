@extends('admin.layouts.master')

@section('title','Thêm Người Dùng')

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
                            Thêm Nhân Viên
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" method="post" action='{{url("admin/nd/them.html")}}'>
                            {{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" type="text" placeholder="Nhập username...">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" type="password" placeholder="Nhập password...">
                                        </div>
                                        <div class="form-group">
                                            <label>Xác nhận Password</label>
                                            <input class="form-control" name="password_confirmation" type="password" placeholder="Nhập password...">
                                        </div>
                                        <div class="form-group">
                                            <label>Chức vụ</label>
                                            <select name="chucvu" class="form-control">
                                                <option value="1">Admin</option>
                                                <option value="2">Nhân Viên Kho</option>
                                                <option value="0">Nhân Viên CSKH</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="trangthai" id="optionsRadios1" value="1" checked>Hoạt động
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="trangthai" id="optionsRadios2" value="0">Không hoạt động
                                                </label>
                                            </div>
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tên</label>
                                            <input class="form-control" name="ten" type="text" placeholder="Nhập tên...">
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input class="form-control" name="diachi" type="text" placeholder="Nhập địa chỉ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại 1</label>
                                            <input class="form-control" name="sdt1" type="text" placeholder="Nhập số điện thoại...">
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại 2</label>
                                            <input class="form-control" name="sdt2" type="text" placeholder="Nhập số điện thoại...">
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại 3</label>
                                            <input class="form-control" name="sdt3" type="text" placeholder="Nhập số điện thoại...">
                                        </div>
                                        <div class="form-group">
                                            <label>Mail</label>
                                            <input class="form-control" name="mail" type="mail" placeholder="Nhập số điện thoại...">
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
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
