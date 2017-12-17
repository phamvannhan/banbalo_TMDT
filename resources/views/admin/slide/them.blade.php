@extends('admin.layouts.master')

@section('title','Thêm Slide')

@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-outline btn-default" href="{{url('admin/sli/danhsach.html')}}">Trở về</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Slide
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form" method="post" action="{{url('admin/sli/them.html')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                           <div class="row">
                                <div class="col-lg-6">
                                       <div class="form-group">
                                        	<label>Ảnh</label>
                                        	<input type="file" name="anh" id="anh" onchange="preUpImg()">
                                    	</div>
                                        <div class="form-group hidden" id="anhxemtruoc">

                                        </div>
                                        <div class="form-group">
                                            <label>Href</label>
                                            <input class="form-control" type="text" id="href" name="href" placeholder="Nhập đường liên kết...">
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
        

    </script>
@endsection