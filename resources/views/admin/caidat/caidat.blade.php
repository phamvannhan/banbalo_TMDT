@extends('admin.layouts.master')

@section('title','Cài Đặt')

@section('content')
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cài Đặt</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thông tin cài đặt
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" method="post" action="{{url('admin/cd/caidat.html')}}">
                        	{{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tên website</label>
                                            <input class="form-control" type="text" name="ten" value="{{$caidat->ten}}" placeholder="Nhập tên website...">
                                        </div>
                                        <div class="form-group">
                                            <label>Từ khóa</label>
                                            <input class="form-control" type="text" name="keywords" value="{{$caidat->keywords}}" placeholder="Nhập từ khóa...">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea  class="form-control" name="mota">{{$caidat->mota}}</textarea>
                                        </div>
                                    	<div class="form-group">
                                        	<label>Địa chỉ</label>
                                        	<input type="text" class="form-control" name="diachi" value="{{$caidat->diachi}}"  placeholder="Nhập địa chỉ...">
                                    	</div>
                                        <div class="form-group">
                                            <label>Mail</label>
                                            <input type="text" class="form-control" name="mail" value="{{$caidat->mail}}"  placeholder="Nhập địa chỉ mail...">
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   
                                    <div class="form-group">
                                        <label>Số điện thoại 1</label>
                                        <input type="number" class="form-control" name="sdt1" value="{{$caidat->sdt1}}"  placeholder="Nhập số điện thoại...">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại 2</label>
                                        <input type="number" class="form-control" name="sdt2" value="{{$caidat->sdt2}}"  placeholder="Nhập số điện thoại...">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại 3</label>
                                        <input type="number" class="form-control" name="sdt3" value="{{$caidat->sdt3}}"  placeholder="Nhập số điện thoại...">
                                    </div>
                                    <div class="form-group">
                                            <label>Trạng thái</label>
                                            @if($caidat->trangthai == 1)
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="trangthai" id="optionsRadios1" value="1" checked>Hoạt động
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="trangthai" id="optionsRadios2" value="0">Bảo trì
                                                </label>
                                            </div>
                                            @else
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="trangthai" id="optionsRadios1" value="1">Hoạt động
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="trangthai" id="optionsRadios2" value="0" checked>Bảo trì
                                                </label>
                                            </div>
                                            @endif
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
	                        <div class="row">
                            	<div class="col-lg-12">
                            		<div class="form-group">
                                    	<button type="submit" class="btn btn-primary">Cập Nhật</button>
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
    <script type="text/javascript">
       
    </script>
@endsection