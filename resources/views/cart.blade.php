@extends('layouts.master')

@section('content')
	<div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-left">
   


                      <div class="page-title">
                            <h1>My cart</h1>
                        </div>
                        <div class="cart">
                            <div class="table-responsive">
                            <table class="table custom-table" style="text-align: center;">
                                <thead>
                                    <tr class="first last">
                                        <th></th>
                                        <th>Mã Sản Phẩm</th>
                                        <th>Hình</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Đơn Gía (VNĐ)</th>
                                        <th>Thành Tiền (VNĐ)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php ($dssp = Session::get('cart')->dssp)

                                    <?php
                               


                                 ?>
                                    @foreach ($dssp as $sp)
                                    <tr>
                                        <td class="text-center"><a class="btn-remove" href="#"><span class="fa fa-trash-o trashbtn" data-id='{{$sp["sp"]->id}}'></span></a></td>
                                        <td>{{$sp['sp']->id}}</td>
                                        <td>
                                          <img src='{{url($sp["sp"]->anhdaidien)}}' width="50">
                                        </td>
                                        <td class="text-center">{{$sp['sp']->ten}}</td>
                                        <td class="qty">
                                            <input type="number" class="soluong"  name="soluong" value='{{$sp["soluong"]}}' style="width: 3em">
                                        </td>
                                        <td class="subtotal">{{number_format($sp['sp']->dongia-(($sp['sp']->dongia*$sp['sp']->khuyenmai)/100))}}</td>
                                        <td class="grandtotal">{{number_format(($sp['sp']->dongia-(($sp['sp']->dongia*$sp['sp']->khuyenmai)/100))*$sp["soluong"])}}</td>
                                    </tr>

                                    @endforeach


                                </tbody>




                            </table>
                            </div>
                            <div class="text-left">
                                Tông Tiền: <span style="font-weight: bold; color: red;">{{number_format(Session::get('cart')->tonggia)}}</span> VNĐ
                            </div>
                            <div class="text-right">
                                <a href='{{route("index")}}' class="btn btn-default btn-md">Tiếp Tục Mua Sắm</a>
                                <form action='{{ url("checkout.html") }}' method="post">
                                    {{ csrf_field() }}
                                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-billing-address=true
                                        data-email="{{Auth::user()->mail}}"
                                        data-allowRememberMe=false
                                        data-key="pk_test_0TlSd0Y1QxpnNfdO6L8luTui"
                                        data-amount="{{Session::get('cart')->tonggia}}"
                                        data-currency="VND"
                                        data-name='{{$title}}'
                                        data-image='{{url("images/logo.png")}}'
                                        data-locale="auto">
                                    </script>
                                </form>
                                
                            </div>
                            <div class="line2"></div>
                        

                        </div>
                         <!-- data-shipping-address=true -->

                    </div><!-- /.col-left -->
                </div>
            </div>
        </div><!-- /.main -->


@endsection

@section('scripts')
     <script type="text/javascript" src='{{url("js/functions.js")}}'></script>
@endsection