@extends('layouts.master')

@section('title','Thông tin quảng cáo')

@section('content')
        
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="page-title">
                            <h1>Thông Tin Quảng Cáo</h1>
                        </div>
                        <div class="page-title">
                            <div class="forms">
                                <div class="nav">
                                    <form action='{{ url("/advertisment.html") }}' method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Ảnh đại diện</label>
                                            <input type="file" name="anh" onchange="preUpImg()" id="anh">
                                        </div>
                                        <div class="form-group hidden" id="anhxemtruoc">
                                        </div>
                                        <div class="form-group">
                                            <label>Href</label>
                                            <input class="form-control" type="text" name="href" placeholder="Nhập href...">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea name="mota"  class="form-control"></textarea>
                                        </div>
                                        <input type="hidden" name="id_qc" value="{{$qlqc->id}}">
                                        <input type="hidden" name="id_kh" value="{{Auth::user()->id}}">
                                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-email="{{Auth::user()->mail}}"
                                                data-allowRememberMe=false
                                                data-key="pk_test_0TlSd0Y1QxpnNfdO6L8luTui"
                                                data-amount="{{$qlqc->gia}}"
                                                data-currency="VND"
                                                data-name='{{$title}}'
                                                data-image='{{url("images/logo.png")}}'
                                                data-locale="auto">
                                            </script>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
                    <div class="col-md-9 col-md-offset-3">
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

@endsection

@section('scripts')
     <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
@endsection