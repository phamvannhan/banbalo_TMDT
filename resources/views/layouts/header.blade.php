
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="#">

    <title>
        @yield('title')
    </title>
    <link href='{{url("css/bootstrap.min.css")}}' rel="stylesheet">
    <link href='{{url("css/nivo-slider.css")}}' rel="stylesheet">
    <link href='{{url("css/animate.css")}}' rel="stylesheet">
    <link href='{{url("css/owl.carousel.css")}}' rel="stylesheet">
    <link href='{{url("css/style.css")}}' rel="stylesheet">
    <link href='{{url("css/responsive.css")}}' rel="stylesheet">
    <link href='{{url("bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css")}}' rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=133251547337071';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
  <meta property="fb:app_id" content="133251547337071" />
<meta property="fb:admins" content="100003129661663"/>
  </head>
  <body>
  
        <div class="header">

        <!--  top bar -- account- login -->
            <div class="topbar">
                <div class="container">
                    <div class="topbar-left">
                        <ul class="topbar-nav clearfix">
                         
                        </ul>
                    </div>
                    <div class="topbar-right">
                        <ul class="topbar-nav clearfix">      
                            @if(Session::get('username'))
                            <li>
                                <a href='{{url("logout.html")}}' class="login">Đăng xuất</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="account dropdown-toggle" data-toggle="dropdown">Tài khoản</a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href='{{url("profile.html")}}'>Thông tin tài khoản</a></li>
                                    <li><a href='{{url("setting.html")}}'>Cài đặt</a></li>
                                    <li><a href='{{url("order.html")}}'>Lịch sử đơn hàng</a></li>
                                    <li><a href='{{url("advertisment.html")}}'>Mua quảng cáo</a></li>
                                    <li><a href='{{url("myadvertisment.html")}}'>Quảng cáo của tôi</a></li>
                                </ul>
                            </li>
                            @else
                            <li>
                                <a href='{{url("login.html")}}' class="login">Đăng nhập</a>
                            </li>
                            @endif
                            
                        </ul>
                    </div>
                </div>
            </div> <!-- topbar -->
        <!--  top bar  account- login -->

            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <!--   logo -->
                            <a href="{{route('index')}}" class="logo"><img src='{{url("upload/quangcao/2017/10/24/logo.png")}}' alt=""></a>
                            <!--   logo -->
                        </div>
                        <div class="col-md-9">

                           <!--  working time freeshoping moneyback -->
                            <div class="support-client">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="box-container time">
                                            <div class="box-inner">
                                                <h2>working time</h2>
                                                <p>Mon- Sun: 8.00 - 18.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box-container free-shipping">
                                            <div class="box-inner">
                                                <h2>Free shipping</h2>
                                                <p>On order over $199</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box-container money-back">
                                            <div class="box-inner">
                                                <h2>Money back 100%</h2>
                                                <p>Within 30 Days after delivery</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.support-client -->
                            <!--  working time freeshoping moneyback -->

                            <!-- serach -->
                            <form class="form-search" method="get" action='{{url("/timkiem.html")}}'>
                                <input type="text" class="input-text" name="txtSearch" placeholder="Tìm kiếm sản phẩm...">
                                <div class="dropdown">
                                    <select name="type" class="btn">
                                        <option value="all">All</option>
                                        @if($dscm)
                                        @foreach($dscm as $cm)
                                            @if($cm->loaisanpham()->get()->toArray())
                                            @foreach($cm->loaisanpham()->orderBy('vitri')->get() as $lsp)
                                                <option value="{{$lsp->id}}">{{$lsp->ten}}</option>
                                            @endforeach
                                            @endif
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="fa fa-search"></span></button>
                            </form>
                            <!-- serach -->

                            <!-- icon cart -->
                            
                            <div class="mini-cart">
                                
                                <div class="top-cart-title">
                                    <a href='{{url("mycart.html")}}' class="">
                                        Số lượng
                                        <span class="price" id="cartsoluong" style="text-align: center;">
                                                @if(Session::has('slsp'))
                                                    {{Session::get('slsp')}}
                                                @endif
                                        </span>
                                    </a>
                                </div>
                                
                            </div>
                            
                            <!-- icon cart -->

                        </div> <!-- col-md-9 -->
                    </div><!-- row -->



                    <div class="row">
                        <!-- menu doc -->
                        <div class="col-md-3">
                          
                        </div> <!-- col-md-3 -->
                        <!-- menu doc -->


                        <!-- menu-ngang -->
                        <div class="col-md-9">
                            <ul class="menu clearfixv    visible-lg visible-md">
                                @if($dscm)
                                    @foreach($dscm as $cm)
                                    <li><a href='' class="dropdown-toggle" data-toggle="dropdown">{{$cm->ten}}</a>
                                        @if($cm->loaisanpham()->get()->toArray())
                                        <ul class="submenu_big">
                                            <li class="dir">
                                                <span class="colr navihead bold">Citizen</span>
                                                <ul>
                                                    @foreach($cm->loaisanpham()->orderBy('vitri')->get() as $lsp)
                                                    <li><a href='{{route("loai",["cm"=>$cm->slug,"lsp"=>$lsp->slug])}}'>{{$lsp->ten}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div><!-- col-md-9 -->
                    <!-- menu-ngang -->
                    </div> <!-- row -->
                </div> <!-- container -->



            </div><!-- /.header-bottom -->
        </div><!-- /.header -->