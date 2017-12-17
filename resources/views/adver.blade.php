@extends('layouts.master')

@section('title','Mua Quảng Cáo')

@section('content')

                                
                     
  
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="page-title">
                            <h1>Mua Quảng Cáo</h1>
                        </div>
                        <div class="page-title">
                            <div class="forms">
                                <div class="nav">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>GIÁ (VNĐ)</th>
                                            <th>VỊ TRÍ</th>
                                            <th>THỜI GIAN</th>
                                            <th>THANH TOÁN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dsqlqc as $qlqc)
                                        <tr class="odd gradeX">
                                            <td>{{$qlqc->id}}</td>
                                            <td>{{number_format($qlqc->gia)}}</td>
                                            <td>{{$qlqc->vitri}}</td>
                                            <td>{{$qlqc->thoigian}}</td>
                                            <td >
                                            <a class="btn btn-primary" href='{{url("/adver/$qlqc->id")}}'>Mua</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

@section('scripts')

 
@endsection