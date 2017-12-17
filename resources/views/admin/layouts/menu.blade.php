<div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="{{url('admin/sp/danhsach.html')}}">Sản Phẩm</a>
                        </li>

                        
                        @if(Session::get('nd')['chucvu'] == 1 || Session::get('nd')['chucvu'] == 0)
                        <li>
                            <a>Đơn Hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('admin/dh/danhsach.html')}}">Đơn Hàng</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/ctdh/danhsach.html')}}">Chi Tiết Đơn Hàng</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('admin/kh/danhsach.html')}}">Khách Hàng</a>
                        </li>
                        <li>
                            <a href="{{url('admin/bl/danhsach.html')}}">Bình Luận</a>
                        </li>
                        @endif

                        @if(Session::get('nd')['chucvu'] == 1 || Session::get('nd')['chucvu'] == 2)
                        <li>
                            <a href="{{url('admin/lsp/danhsach.html')}}">Loại Sản Phẩm</a>
                        </li>
                        <li>
                           <a>Phiếu Nhập<span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('admin/pn/danhsach.html')}}">Phiếu Nhập</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/ctpn/danhsach.html')}}">Chi Tiết Phiếu Nhập</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if(Session::get('nd')['chucvu'] == 1)
                        <li>
                            <a href="{{url('admin/tk/thongke.html')}}">Thống Kê</a>
                        </li>      
                        <li>
                            <a href="{{url('admin/ncc/danhsach.html')}}">Nhà Cung Cấp</a>
                        </li>
                        <li>
                            <a href="{{url('admin/cm/danhsach.html')}}">Chuyên Mục</a>
                        </li>
                        
                        <li>
                            <a>Quản Lí Quảng Cáo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a  href="{{url('admin/qlqc/danhsach.html')}}">Quản Lí</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/qc/danhsach.html')}}">Danh Sách Mua</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('admin/nd/danhsach.html')}}">Người Dùng</a>
                        </li>
                        
                        <li>
                            <a href="{{url('admin/sli/danhsach.html')}}">Slide</a>
                        </li>
                        <li>
                            <a href="{{url('admin/cd/caidat.html')}}">Cài Đặt</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
            </nav>