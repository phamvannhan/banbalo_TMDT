@extends('admin.layouts.master')

@section('title','Đổi Mật Khẩu')

@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đổi Mật Khẩu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Mật khẩu
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" method="post" action='{{url("admin/pro/matkhau.html")}}'>
                        	{{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                        	<label>Mật khẩu cũ</label>
                                            <input class="form-control" name="oldpassword" type="password" placeholder="Nhập tên mật khẩu cũ...">
                                    	</div>
                                        <div class="form-group">
                                            <label>Mật khẩu mới</label>
                                            <input class="form-control" name="newpassword" type="password" placeholder="Nhập mật khẩu mới...">
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu mới</label>
                                            <input class="form-control" name="newrepassword" type="password" placeholder="Nhập lại mật khẩu mới...">
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