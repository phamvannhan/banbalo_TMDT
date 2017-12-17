@extends('admin.layouts.master')

@section('title','Sửa Chuyên Mục')

@section('content')
		 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chuyên Mục</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/cm/danhsach.html')}}">Trở về</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sửa Chuyên Mục
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" method="post" action='{{url("admin/cm/$cm->id/sua.html")}}'>
                            {{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tên chuyên mục</label>
                                            <input class="form-control" type="text" name="ten" value="{{$cm->ten}}" placeholder="Nhập tên loại sản phẩm...">
                                            <input type="hidden" name="slug" id="slug" value="{{$cm->slug}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Vị trí</label>
                                            <input class="form-control" type="text" name="vitri" value="{{$cm->vitri}}" placeholder="Nhập vị trí...">
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
@endsection
