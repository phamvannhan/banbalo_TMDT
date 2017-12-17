@extends('admin.layouts.master')

@section('title','Thông Tin Cá Nhân')

@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thông Tin Cá Nhân</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thông tin
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" method="post" action='{{url("admin/pro/profile.html")}}'>
                        	{{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                        	<label>Tên</label>
                                            <input class="form-control" name="ten" value="{{$nd->ten}}" type="text" placeholder="Nhập tên...">
                                    	</div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input class="form-control" name="diachi" value="{{$nd->diachi}}" type="text" placeholder="Nhập địa chỉ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại 1</label>
                                            <input class="form-control" name="sdt1" value="{{$nd->sdt1}}" type="text" placeholder="Nhập số điện thoại...">
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại 2</label>
                                            <input class="form-control" name="sdt2" value="{{$nd->sdt2}}" type="text" placeholder="Nhập số điện thoại...">
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại 3</label>
                                            <input class="form-control" name="sdt3" value="{{$nd->sdt3}}" type="text" placeholder="Nhập số điện thoại...">
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