@extends('layouts.master')

@section('title','Quảng Cáo Đang Chạy')

@section('content')
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="page-title">
                            <h1>Quảng Cáo Đang Chạy</h1>
                        </div>
                        <div class="page-title">
                            <div class="forms">
                                <div class="nav">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ẢNH</th>
                                            <th>HREF</th>
                                            <th>MÔ TẢ</th>
                                            <th>NGÀY CÒN LẠI</th>
                                            <th>GIÁ</th>
                                            <th>NGÀY MUA</th>
                                            <th>CÔNG CỤ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($dsqc)
                                        @foreach($dsqc as $qc)
                                            <tr class="odd gradeX">
                                                <td>{{$qc->id}}</td>
                                                <td><img src='{{url($qc->anh)}}' width="50"></td>
                                                <td>{{$qc->href}}</td>
                                                <td>{{$qc->mota}}</td>
                                                <td>{{$qc->ngayconlai}}</td>
                                                <td>{{number_format($qc->quanliquangcao['gia'])}}</td>
                                                <td>{{$qc->created_at}}</td>
                                                <td >
                                                <a class="btn btn-primary" href='{{url("/myadver/$qc->id")}}'>Sửa</a></td>
                                            </tr>
                                        @endforeach
                                        @else
                                            <p>Bạn chưa mua quảng cáo</p>
                                        @endif
                                    </tbody>
                                </table>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12">
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

@section('scripts')

 
@endsection