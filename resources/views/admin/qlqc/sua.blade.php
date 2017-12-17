@extends('admin.layouts.master')

@section('title','Sửa Quảng Cáo')

@section('content')
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại Quảng Cáo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                   <a class="btn btn-outline btn-default" href="{{url('admin/qlqc/danhsach.html')}}">Trở về</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sửa Loại Quảng Cáo
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" method="post" action='{{url("admin/qlqc/$qlqc->id/sua.html")}}'>
                            {{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Gía</label>
                                            <input class="form-control" type="text" name="gia" value="{{$qlqc->gia}}" id="gia" placeholder="Nhập giá...">
                                        </div>
                                        <div class="form-group">
                                            <label>Thời gian</label>
                                            <input class="form-control" type="text" value="{{$qlqc->thoigian}}"name="thoigian" id="thoigian" placeholder="Nhập thời gian...">
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
    <script type="text/javascript">

    </script>
@endsection