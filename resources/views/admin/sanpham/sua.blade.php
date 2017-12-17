@extends('admin.layouts.master')

@section('title','Sửa Sản Phẩm')

@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/sp/danhsach.html')}}">Trở về</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sửa Sản Phẩm
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" action='{{url("admin/sp/$sp->id/sua.html")}}' method="post">
                            {{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input class="form-control" type="text" id="ten" name="ten" value="{{$sp->ten}}" placeholder="Nhập tên sản phẩm...">
                                            <input type="hidden" name="slug" id="slug" value="{{$sp->slug}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Từ khóa</label>
                                            <input class="form-control" type="text" id="tukhoa" name="tukhoa" value="{{$sp->tukhoa}}" placeholder="Nhập từ khóa...">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea  class="form-control" id="mota"  name="mota">{{$sp->mota}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh hiện tại</label>
                                            <img src='{{url($sp->anhdaidien)}}' width="50">
                                        </div>
                                        <div class="form-group">
                                            <label>Đơn giá</label>
                                            <input type="text" class="form-control" id="dongia" name="dongia" value="{{$sp->dongia}}">
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   
                                    <div class="form-group">
                                        <label>Khuyến mãi</label>
                                        <input type="text" class="form-control" id="khuyenmai" name="khuyenmai" value="{{$sp->khuyenmai}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input type="text" class="form-control" disabled="disabled"  id="soluong" name="soluong" value="{{$sp->soluong}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Loại</label>
                                        <div class="row">
                                            <div class="col-lg-10">
                                            <select class="form-control" name="loai" id="loai">
                                                @foreach($dsloai as $loai)
                                                    @if($loai->id == $sp->id_loai)
                                                        <option value="{{$loai->id}}" selected="selected">{{$loai->id}}-{{$loai->ten}}</option>
                                                    @else
                                                        <option value="{{$loai->id}}">{{$loai->id}}-{{$loai->ten}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="button" class="btn btn-default btnthemloai">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nhà cung cấp</label>
                                        <div class="row">
                                            <div class="col-lg-10">
                                            <select class="form-control" name="ncc" id="ncc">
                                                @foreach($dsncc as $ncc)
                                                    @if($ncc->id == $sp->id_ncc)
                                                        <option value="{{$ncc->id}}" selected="selected">{{$ncc->ten}}</option>
                                                    @else
                                                        <option value="{{$ncc->id}}">{{$ncc->ten}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="button" class="btn btn-default btnthemncc">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                            <label>Trạng thái</label>
                                            @if($sp->trangthai == 1)
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="trangthai" id="optionsRadios1" value="1" checked>Hoạt động
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="trangthai" id="optionsRadios2" value="0">Ẩn
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
                                                    <input type="radio" name="trangthai" id="optionsRadios2" value="0" checked>Ẩn
                                                </label>
                                            </div>
                                            @endif
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                        <label>Nội dung</label>
                                        <textarea id="noidung" name="noidung">{{$sp->noidung}}</textarea>
                                </div>
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
    <script src="{{url('js/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('noidung',{
            language:'vi',
            filebrowserBrowseUrl :'../public/js/plugins/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '../../../js/plugins/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : '../../../js/plugins/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl : '../../../js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '../../../js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : '../../../js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });

        $('.btnthemloai').click(function(){
            windowChild = window.open('{{url("admin/lsp/them.html")}}', "Thêm Loại Sản Phẩm", "width=500, height=500" );
            windowChild.moveTo(100, 100);
        });

        $('.btnthemncc').click(function(){
            windowChild = window.open('{{url("admin/ncc/them.html")}}', "Thêm Nhà Cung Cấp", "width=500, height=500" );
            windowChild.moveTo(100, 100);
        });
        
        $('#loai').mouseover(function(){
            $.get('{{url("admin/sp/load.html")}}',{type: "lsp"},function(data){
                $('select').eq(0).html(data);
            })
        });

        $('#ncc').mouseover(function(){
            $.get('{{url("admin/sp/load.html")}}',{type: "ncc"},function(data){
                $('select').eq(1).html(data);
            })
        });


        $('#ten').keyup(function(){
            $('#slug').val() = ChangeToSlug();
        });
    </script>
@endsection