@extends('layouts.master')

@section('title','Đăng nhập')

@section('content')

	<div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="page-title">
                            <h1>LOGIN</h1>
                        </div>
                        <div class="row products">
                            <div class="col-md-9">
                                <form method="post" action='{{url("login.html")}}'>
                                    {{csrf_field()}}
                                <div class="content">
                                    <h3 class="txt_login">Please Sign In</h3>
                                    <ul class="forms">
                                        <li class="txt">
                                            Username <span class="req">*</span></li>
                                        </li>
                                        <li class="input-group inputfield">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="text" name="username" class="form-control" placeholder="username">
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            Password <span class="req">*</span></li>
                                        </li>
                                        <li class="input-group inputfield">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                        </li>
                                        <li class="input-group inputfield">
                                            @captcha
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            Captcha
                                        </li>
                                        <li class="input-group inputfield">
                                            <input type="text" id="captcha" name="captcha" class="form-control">
                                        </li>
                                    </ul>
                                    <ul class="forms forms-Login">
                                        <li class="txt">&nbsp;</li>
                                        <li style="margin-left: 40px;"><button class="btn btn-danger" title="Login" type="submit">Login</button></li> 
                                    </ul>
                                    <ul class="forms">
                                        <a href='{{url("register.html")}}' style="float:left;margin-left:175px;padding-top:7px;text-decoration:underline;">Đăng ký</a>
                                        <a href='{{url("/forget.html")}}' style="float:left;margin-left:40px;padding-top:7px;text-decoration:underline;">Quên mật khẩu?</a>
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