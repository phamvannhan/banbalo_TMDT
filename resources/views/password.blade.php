@extends('layouts.master')

@section('title','Cài Đặt')

@section('content')

	<div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="page-title">
                            <h1>Cài đặt</h1>
                        </div>
                        <div class="row products">
                            <div class="col-md-9">
                                <form method="post" action='{{url("password.html")}}'>
                                    {{csrf_field()}}
                                <div class="content">
                                    <h3 class="txt_login">Mật khẩu</h3>
                                    <ul class="forms">
                                        <li class="txt">
                                            Old-Password <span class="req">*</span></li>
                                        </li>
                                        <li class="input-group inputfield">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="password" name="oldpassword" class="form-control" placeholder="password">
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            New-Password <span class="req">*</span></li>
                                        </li>
                                        <li class="input-group inputfield">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="password" name="newpassword" class="form-control" placeholder="password">
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            Re-Newpassword <span class="req">*</span></li>
                                        </li>
                                        <li class="input-group inputfield">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="password" name="newrepassword" class="form-control" placeholder="re-newpassword">
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

                <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="page-title">
                            <h1>Bảo Mật</h1>
                        </div>
                        <div class="row products">
                            <div class="col-md-9">
                                <div class="content">
                                    <h3 class="txt_login">Xác Minh 2 Bước</h3>
                                    <ul class="forms">
                                        <li class="txt">
                                            Loại <span class="req"></span></li>
                                        </li>
                                        <li>
                                            @php($checkedmail = '')
                                            @php($checkedgoogle = '')
                                            @if(Auth::user()['otp'] == 1)
                                                @php($checkedmail = 'checked')
                                            @elseif(Auth::user()['otp'] != null && Auth::user()['otp'] != 1)
                                                @php($checkedgoogle = 'checked')
                                            @endif

                                            <input type="radio" name="type" value="mail" id="mail" {{$checkedmail}}> Mail 
                                            <input type="radio" name="type" value="google" id="google" {{$checkedgoogle}}> Google Authenticator
                                        </li>
                                    </ul>
                                    <ul class="forms">
                                        <li class="txt">
                                            Trạng thái <span class="req"></span></li>
                                        </li>
                                        <li class="input-group inputfield">
                                            @if(Auth::user()['otp'] != null)
                                                @php($checked = 'checked')
                                            @else
                                                @php($checked = '')
                                            @endif
                                           <input type="checkbox" name="my-checkbox" {{$checked}}>
                                        </li>
                                    </ul>
                                    <ul class="forms forms-Login">
                                       
                                    </ul>
                          
      
                                </div>
                            </div>
                        </div><!-- /.product -->



                        <div style="margin-top:70px"></div>

                    </div><!-- /.col-right -->
                </div>
            </div>
        </div><!-- /.main -->
@endsection

@section('scripts')
    <script src='{{url("bootstrap-switch/dist/js/bootstrap-switch.js")}}'></script>
    <script type="text/javascript">
        $("[name='my-checkbox']").bootstrapSwitch();
     
            $('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
                if(state == true){
                    if($('#mail').is(':checked')){
                        location.href= '{{url("mail.html?stt=on")}}';
                    }else if($('#google').is(':checked')){
                        location.href= '{{url("2fa.html?stt=on")}}';
                    }
                }else{
                    if($('#mail').is(':checked')){
                        location.href= '{{url("mail.html?stt=off")}}';
                    }else if($('#google').is(':checked')){
                        location.href = '{{url("2fa.html?stt=off")}}';
                    }
                }
            });

        
    </script>
@endsection