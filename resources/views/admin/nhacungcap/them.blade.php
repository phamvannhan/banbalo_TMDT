@extends('admin.layouts.master')

@section('title','Thêm Nhà Cung Cấp')

@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nhà Cung Cấp</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                     <a class="btn btn-outline btn-default" href="{{url('admin/ncc/danhsach.html')}}">Trở về</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Nhà Cung Cấp
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" method="post" action="{{url('admin/ncc/them.html')}}">
                            {{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tên nhà cung cấp</label>
                                            <input class="form-control" type="text" name="ten" placeholder="Nhập tên nhà cung cấp...">
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input class="form-control" type="number" name="sdt" placeholder="Nhập số điện thoại...">
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input class="form-control" type="text" name="diachi" placeholder="Nhập địa chỉ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Mail</label>
                                            <input class="form-control" type="email" name="mail" placeholder="Nhập mail...">
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
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
    <script type="text/javascript">


    </script>
@endsection