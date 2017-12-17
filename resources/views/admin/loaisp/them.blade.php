@extends('admin.layouts.master')

@section('title','Thêm Loại Sản Phẩm')

@section('content')
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại Sản Phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/lsp/danhsach.html')}}">Trở về</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Loại Sản Phẩm
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" method="post" action="{{url('admin/lsp/them.html')}}">
                            {{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tên loại sản phẩm</label>
                                            <input class="form-control" type="text" id="ten" name="ten" placeholder="Nhập tên loại sản phẩm...">
                                            <input type="hidden" name="slug" id="slug" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Vị trí</label>
                                            <input class="form-control" type="text" name="vitri" placeholder="Nhập vị trí...">
                                        </div>
                                        <div class="form-group">
                                            <label>Chuyên mục</label>
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <select  class="form-control" name="id_cm" id="cm">
                                                    @if(!empty($dscm))
                                                        @foreach($dscm as $cm)
                                                            <option value="{{$cm->id}}">{{$cm->ten}}</option>
                                                        @endforeach
                                                    @else
                                                        <option>Chưa có chuyên mục</option>
                                                    @endif
                                                    </select>
                                                </div>
                                                <div class="col-lg-1">
                                                    <button type="button" class="btn btn-default btnthem">Thêm</button>
                                                </div>
                                            </div>
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
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">
        $('.btnthem').click(function(){
            windowChild = window.open('{{url("admin/cm/them.html")}}', "Thêm Chuyên Mục", "width=500, height=500" );
            windowChild.moveTo(100, 100);
   
        });
        
        $('#cm').mouseover(function(){
            $.get('{{url("admin/lsp/load.html")}}',{type: "cm"},function(data){
                $('select').html(data);
            })
        });

    </script>
@endsection
