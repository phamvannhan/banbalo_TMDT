@extends('admin.layouts.master')

@section('title','Thêm Phiếu Nhập')

@section('content')
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phiếu Nhập</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3">
                    <a class="btn btn-outline btn-default" href="{{url('admin/pn/danhsach.html')}}">Trở về</a>
                </div>
                <div class="col-lg-3">
                    <span>Ngày đặt: </span>
                    <input id="date" type="date" class="form-control">
                </div>
                <div class="col-lg-3">
                    <span>Nhà Cung Cấp: </span>
                    <select class="form-control" id="ncc" name="id_ncc">
                        @if(!empty($dsncc))
                            @foreach($dsncc as $ncc)
                                <option value="{{$ncc->id}}">{{$ncc->ten}}</option>
                            @endforeach
                        @else
                            <option>Chưa có nhà cung cấp nào</option>
                        @endif
                    </select>
                </div>
                 <div class="col-lg-3">
                    <span>Tổng giá: </span><input type="text" id="tonggia" disabled="disabled"><span>VNĐ</span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Chi Tiết Phiếu Nhập
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form role="form">
                           <div class="row">
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Sản Phẩm</label>
                                            <select class="form-control" id="id_sp">
                        
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Số Lượng</label>
                                            <input class="form-control" id="soluong" type="number" placeholder="Nhập số lượng...">
                                        </div>
                                        <div class="form-group">
                                            <label>Gía nhập</label>
                                            <input class="form-control" id="gianhap" type="number" placeholder="Nhập giá nhập...">
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btnthem">Thêm</button>
                                        <button type="reset" class="btn btn-default">Làm lại</button>
                                        <button type="button" id="btnedit" class="btn btn-warning">Sửa</button>
                                        <button type="button" id="btndel" class="btn btn-danger">Xóa</button>
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
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh Sách Chi Tiết Phiếu Nhập
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SẢN PHẨM</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>GIÁ NHẬP</th>
                                        <!-- <th colspan="2">CÔNG CỤ</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                        
                        
                                </tbody>
                            </table>             
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="button" id="luu" class="btn btn-primary">Lưu lại</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <p class="alert alert-danger hidden" id="thongbao"></p>
                                    </div>
                                </div>
                            </div>
 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div id="sss"></div>

@endsection
@section('scripts')
    <script type="text/javascript" src='{{url("js/functions.js")}}''></script>
    <script type="text/javascript">

        $url = ''
        $('#ncc').click(function(){
            $id = $(this).val();
            $.get('{{url("admin/pn/load.html")}}',{id:$id,type:'sp'},function(data){
                $('select:eq(1)').html(data);
            });


        });

        $id_sp = [];
        $soluong = [];
        $gianhap = [];
        $tong = 0;

        function sendCTPN($type,$id_sp,$soluong,$gianhap,$id_ncc = '',$tonggia = '',$ngaydat = ''){
            $.get('{{url("admin/pn/ctpn.html")}}',{type:$type,id_sp:$id_sp,soluong:$soluong,gianhap:$gianhap,id_ncc:$id_ncc,tonggia:$tonggia,ngaydat:$ngaydat},function(data){
                $('tbody').html(data);
            });
        };

        $('.btnthem').click(function(){
            $id_sp.push($('#id_sp').val());
            $soluong.push($('#soluong').val());
            $gianhap.push($('#gianhap').val());
            sendCTPN(0,$id_sp,$soluong,$gianhap);
            $tong = ($tong + parseInt($('#gianhap').val())); 
            $('#tonggia').val($tong);
        });

        $('#btndel').click(function(){
            $id = $('#id_sp').val();
            for($i = 0; $i < $id_sp.length ; $i++){
                if($id_sp[$i] == $id){
                    $id_sp.splice($i,1);
                    $tong = ($tong - $gianhap[$i]); 
                    $('#tonggia').val($tong);
                    break;
                }
            }
            sendCTPN(0,$id_sp,$soluong,$gianhap);
        });

        $('#btnedit').click(function(){
            $id = $('#id_sp').val();
            $sl = $('#soluong').val();
            $gn = $('#gianhap').val();
            for($i = 0; $i < $id_sp.length ; $i++){
                if($id_sp[$i] == $id){
                    $tong = ($tong - ($gianhap[$i]-$gn)); 
                    $('#tonggia').val($tong);
                    $soluong[$i] = $sl;
                    $gianhap[$i] = $gn;
                    break;
                }
            }
            sendCTPN(0,$id_sp,$soluong,$gianhap);
        });

        $('#luu').click(function(){
            $ncc = $('#ncc').val();
            $tonggia = $('#tonggia').val();
            $date = $('#date').val();
            if($ncc == '' || $tonggia == '' || $date == '' || $id_sp.length == 0 || $soluong.length == 0 || $gianhap.length == 0){
                $('#thongbao').removeClass('hidden');
                $('#thongbao').html('Vui lòng điền đầy đủ thông tin');
            }else{
                sendCTPN(1,$id_sp,$soluong,$gianhap,$ncc,$tonggia,$date);
                location.reload();
            }
            
        });

        
    </script>
@endsection
