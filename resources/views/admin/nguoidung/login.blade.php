@include('admin.layouts.header')

@section('title','Đăng Nhập')

<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng Nhập</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action='{{url("admin/login.html")}}'>
                            {{csrf_field()}}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nhập username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nhập password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    @captcha
                                    <input type="text" id="captcha" name="captcha" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                                <div class="col-md-4 col-md-offset-4">
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
@include('admin.layouts.footer')