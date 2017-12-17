@extends('layouts.master')

@section('Đăng ký')

@section('content')
 <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="page-title">
                            <h1>ĐĂNG KÝ</h1>
                        </div>
                        <div class="row products">
                        	<form method="post" action='{{url("/register.html")}}'>
                        		{{csrf_field()}}
                            <div class="col-md-9">
                                <div class="content">
                                    <h3 class="txt_login">Thông tin đăng ký</h3>
                                    <ul class="forms">
                                        <li class="txt">
                                            Username <span class="req">*</span>
                                        </li>
                                        <li class="inputfield">
                                            <input type="text" name="username" class="bar" placeholder="username">
                                            <input type="hidden" name="loaikh" value="1">
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            Password <span class="req">*</span>
                                        </li>
                                        <li class="inputfield">
                                            <input type="password" name="password" class="bar" placeholder="password">
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            Re-Password <span class="req">*</span>
                                        </li>
                                        <li class="inputfield">
                                            <input type="password" name="password_confirmation" class="bar" placeholder="re-password">
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            Họ và Tên <span class="req">*</span>
                                        </li>
                                        <li class="inputfield">
                                            <input type="text" name="ten" class="bar" placeholder="họ và tên">
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            Email <span class="req">*</span>
                                        </li>
                                        <li class="inputfield">
                                            <input type="text" name="mail" class="bar" placeholder="email">
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            Số điện thoại 
                                        </li>
                                        <li class="inputfield">
                                            <input type="number" name="sodienthoai" class="bar" placeholder="số điện thoại">
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            Địa chỉ 
                                        </li>
                                        <li class="inputfield">
                                            <textarea class="form-control" rows="5" id="comment" name="diachi"></textarea>
                                        </li>
                                    </ul>
                                    <ul class="forms forms-Login">
                                        <li class="txt">&nbsp;</li>
                                        <li><button class="btn btn-danger" title="Login" type="submit">Đăng Ký</button>
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <a href='{{url("login.html")}}' style="float:left;margin-left:175px;padding-top:7px;text-decoration:underline;">Đăng nhập</a>
                                        <a href="#" style="float:left;margin-left:40px;padding-top:7px;text-decoration:underline;">Quên mật khẩu?</a>
                                    </ul>
                                </div>
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