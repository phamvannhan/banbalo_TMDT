@extends('layouts.master')
@section('title','Cài Đặt')

@section('content')
		<div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="page-title">
                            <h1>Xác minh 2 bước</h1>
                        </div>
                        <div class="row products">
                            <div class="col-md-9">
                                <form method="post" action='{{url("mail.html")}}'>
                                    {{csrf_field()}}
                    
                                    <input type="hidden" value="{{$_GET['stt']}}" name="stt" >
                         
                                <div class="content">
                                    <h3 class="txt_login">{{$title}}</h3>
                                    <ul class="forms">
                                        <li class="txt">
                                            Mã <span class="req">*</span></li>
                                        </li>
                                        <li class="input-group inputfield">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="number" name="secret" class="form-control" placeholder="Nhập mã...">
                                        </li>
                                    </ul>
                                    <ul class="forms forms-Login">
                                        <li class="txt">&nbsp;</li>
                                        <li style="margin-left: 40px;"><button class="btn btn-danger" title="Login" type="submit">Lưu Lại</button></li> 
                                    </ul>
                                </div>
                                </form>
                            </div>
                            <div class="col-md-9">
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
                        </div><!-- /.product -->



                        <div style="margin-top:70px"></div>

                    </div><!-- /.col-right -->
                </div>

               
            </div>
        </div><!-- /.main -->

        @endsection