@extends('layouts.master')

@section('title','Thông tin tài khoản')

@section('content')
        
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="page-title">
                            <h1>Thông Tin Tài Khoản</h1>
                        </div>
                        <div class="page-title">
                            <div class="forms">
                                <div class="nav">
                                    <div class="img-thumbnail">
                                        <img id="Imagel" src="images/camera.jpg" >
                                        <button class="btn btn-default btn-mdf" background-color: #444;" id="files" onclick="document.getElementById('file').click(); return false;">Upload file</button>
                                        <input type="file" id="file" onchange="readURL(this);" style="visibility:hidden" accept="image/*">
                                    </div>
                                </div>
                                <div class="nav">
                                    <form method="post" action="{{url('profile.html')}}">
                                        {{csrf_field()}}
                                    <div class="Information">
                                        <ul class="forms">
                                            <li class="txt">
                                                Họ và Tên <span class="req">*</span></li>
                                            </li>
                                            <li class="inputfield">
                                                <input type="text" name="ten" class="bar" value="{{$kh->ten}}">
                                            </li>
                                        </ul>
                                        <ul class="forms">
                                            <li class="txt">
                                                Số điện thoại <span class="req">*</span></li>
                                            </li>
                                            <li class="inputfield">
                                                <input type="text" name="sodienthoai" class="bar" value="{{$kh->sodienthoai}}">
                                            </li>
                                        </ul>
                                        <ul class="forms">
                                            <li class="txt">
                                                Mail</li>
                                            </li>
                                            <li class="inputfield">
                                                <input type="text" name="mail" class="bar" value="{{$kh->mail}}">
                                            </li>
                                        </ul>
                                        <ul class="forms">
                                            <li class="txt">
                                                Địa chỉ</li>
                                            </li>
                                            <li class="inputfield">
                                                <textarea class="form-control" rows="5" id="comment" name="diachi">{{$kh->diachi}}</textarea>
                                            </li>
                                        </ul>
                                        <ul class="forms forms-Login">
                                            <li class="txt">&nbsp;</li>
                                            <li><button class="btn btn-default btn-md" title="Login" type="submit">Lưu Lại</button> 
                                            </li>      
                                        </ul>
                                    </div>
                                </form>
                                </div>
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
                </div>
            </div>
        </div>

@endsection