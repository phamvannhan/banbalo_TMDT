<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin',function(){
	return redirect()->route('login');
});

Route::group(['prefix'=>'/admin'],function(){
	Route::get('/login.html','NguoiDungController@getLogin')->name('login');
	Route::post('/login.html','NguoiDungController@postLogin');
	Route::get('/logout.html','NguoiDungController@getLogout');
});

Route::group(['prefix'=>'/admin'],function(){

	Route::group(['prefix'=>'/cm','middleware'=>'allowaccess:cm'],function(){
		Route::get('/danhsach.html','ChuyenMucController@getDanhSach');
		Route::get('/them.html','ChuyenMucController@getThem');
		Route::post('/them.html','ChuyenMucController@postThem');
		Route::get('/{id}/sua.html','ChuyenMucController@getSua');
		Route::post('/{id}/sua.html','ChuyenMucController@postSua');
		Route::get('/xoa.html','ChuyenMucController@getXoa');
		Route::get('/timkiem.html','ChuyenMucController@getTimKiem');
	});

	Route::group(['prefix'=>'/lsp','middleware'=>'allowaccess:lsp'],function(){
		Route::get('/danhsach.html','LoaiSanPhamController@getDanhSach');
		Route::get('/them.html','LoaiSanPhamController@getThem');
		Route::post('/them.html','LoaiSanPhamController@postThem');
		Route::get('/{id}/sua.html','LoaiSanPhamController@getSua');
		Route::post('/{id}/sua.html','LoaiSanPhamController@postSua');
		Route::get('/xoa.html','LoaiSanPhamController@getXoa');
		Route::get('/load.html','LoaiSanPhamController@getLoading');
		Route::get('/timkiem.html','LoaiSanPhamController@getTimKiem');
	});

	Route::group(['prefix'=>'/cd','middleware'=>'allowaccess:cd'],function(){
		Route::get('/caidat.html','CaiDatController@getIndex');
		Route::post('/caidat.html','CaiDatController@postIndex');
	});

	Route::group(['prefix'=>'/sli','middleware'=>'allowaccess:sli'],function(){
		Route::get('/danhsach.html','SlideController@getDanhSach');
		Route::get('/them.html','SlideController@getThem');
		Route::post('/them.html','SlideController@postThem');
		Route::get('/{id}/sua.html','SlideController@getSua');
		Route::post('/{id}/sua.html','SlideController@postSua');
		Route::get('/xoa.html','SlideController@getXoa');
		Route::get('/timkiem.html','SlideController@getTimKiem');
	});

	Route::group(['prefix'=>'/ncc','middleware'=>'allowaccess:ncc'],function(){
		Route::get('/danhsach.html','NhaCungCapController@getDanhSach');
		Route::get('/them.html','NhaCungCapController@getThem');
		Route::post('/them.html','NhaCungCapController@postThem');
		Route::get('/{id}/sua.html','NhaCungCapController@getSua');
		Route::post('/{id}/sua.html','NhaCungCapController@postSua');
		Route::get('/xoa.html','NhaCungCapController@getXoa');
		Route::get('/timkiem.html','NhaCungCapController@getTimKiem');
	});

	Route::group(['prefix'=>'/kh','middleware'=>'allowaccess:kh'],function(){
		Route::get('/danhsach.html','KhachHangController@getDanhSach');
		Route::get('/xoa.html','KhachHangController@getXoa');
		Route::get('/timkiem.html','KhachHangController@getTimKiem');
	});

	Route::group(['prefix'=>'/sp','middleware'=>'allowaccess:sp'],function(){
		Route::get('/danhsach.html','SanPhamController@getDanhSach')->name('sp');
		Route::get('/them.html','SanPhamController@getThem');
		Route::post('/them.html','SanPhamController@postThem');
		Route::get('/{id}/sua.html','SanPhamController@getSua');
		Route::post('/{id}/sua.html','SanPhamController@postSua');
		Route::get('/{id}/anh.html','SanPhamController@getAnh');
		Route::post('/{id}/anh.html','SanPhamController@postAnh');
		Route::get('/{id}/binhluan.html','SanPhamController@getBinhLuan');
		Route::get('/xoa.html','SanPhamController@getXoa');
		Route::get('/load.html','SanPhamController@getLoading');
		Route::get('/sale.html','SanPhamController@getSale');
		Route::get('/timkiem.html','SanPhamController@getTimKiem');
	});

	Route::group(['prefix'=>'/qlqc','middleware'=>'allowaccess:qlqc'],function(){
		Route::get('/danhsach.html','QuanLiQuangCaoController@getDanhSach');
		Route::get('/{id}/sua.html','QuanLiQuangCaoController@getSua');
		Route::post('/{id}/sua.html','QuanLiQuangCaoController@postSua');
		Route::get('/{id}/chitiet.html','QuanLiQuangCaoController@getChiTiet');
	});

	Route::group(['prefix'=>'/qc','middleware'=>'allowaccess:qc'],function(){
		Route::get('/danhsach.html','QuangCaoController@getDanhSach');
		Route::get('/xoa.html','QuangCaoController@getXoa');
		Route::get('/timkiem.html','QuangCaoController@getTimKiem');
	});

	Route::group(['prefix'=>'/nd','middleware'=>'allowaccess:nd'],function(){
		Route::get('/danhsach.html','NguoiDungController@getDanhSach');
		Route::get('/them.html','NguoiDungController@getThem');
		Route::post('/them.html','NguoiDungController@postThem');
		Route::get('/{id}/sua.html','NguoiDungController@getSua');
		Route::post('/{id}/sua.html','NguoiDungController@postSua');
		Route::get('/xoa.html','NguoiDungController@getXoa');
		Route::get('/trangthai.html','NguoiDungController@getTrangThai');
		Route::get('/timkiem.html','NguoiDungController@getTimKiem');
	});

	Route::group(['prefix'=>'/pro','middleware'=>'allowaccess:pro'],function(){
		Route::get('profile.html','NguoiDungController@getProfile');
		Route::post('profile.html','NguoiDungController@postProfile');
		Route::get('matkhau.html','NguoiDungController@getMatKhau');
		Route::post('matkhau.html','NguoiDungController@postMatKhau');
	});

	Route::group(['prefix'=>'/bl','middleware'=>'allowaccess:bl'],function(){
		Route::get('/danhsach.html','BinhLuanController@getDanhSach');
		Route::get('/xoa.html','BinhLuanController@getXoa');
		Route::get('/timkiem.html','BinhLuanController@getTimKiem');
		Route::get('/{id}/chitiet.html','BinhLuanController@getChiTiet');
	});
	
	Route::group(['prefix'=>'/dh','middleware'=>'allowaccess:dh'],function(){
		Route::get('/danhsach.html','DonHangController@getDanhSach');
		Route::get('/{id}/chitiet.html','DonHangController@getChiTiet');
		Route::get('/changestt.html','DonHangController@changeStatus');
		Route::get('/timkiem.html','DonHangController@getTimKiem');
	});

	Route::group(['prefix'=>'ctdh','middleware'=>'allowaccess:ctdh'],function(){
		Route::get('/danhsach.html','ChiTietDonHangController@getDanhSach');
		Route::get('/timkiem.html','ChiTietDonHangController@getTimKiem');
	});

	Route::group(['prefix'=>'/pn','middleware'=>'allowaccess:pn'],function(){
		Route::get('/danhsach.html','PhieuNhapController@getDanhSach');
		Route::get('/them.html','PhieuNhapController@getThem');
		Route::get('/load.html','PhieuNhapController@getLoading');
		Route::get('/ctpn.html','PhieuNhapController@storeCTPN');
		Route::get('/{id}/chitiet.html','PhieuNhapController@getChiTiet');
		Route::get('/xoa.html','PhieuNhapController@getXoa');
		Route::get('/timkiem.html','PhieuNhapController@getTimKiem');
	});

	Route::group(['prefix'=>'/ctpn','middleware'=>'allowaccess:ctpn'],function(){
		Route::get('/danhsach.html','ChiTietPhieuNhapController@getDanhSach');
		Route::get('/timkiem.html','ChiTietPhieuNhapController@getTimKiem');
	});

	Route::group(['prefix'=>'/tk','middleware'=>'allowaccess:ctpn'],function(){
		Route::get('/thongke.html','ThongKeController@getThongKe');
		Route::post('/thongke.html','ThongKeController@getThongKe');
		Route::post('/xuatfile.html','ThongKeController@exportFile');
		//Route::get('/xuat.html','ThongKeController@File');
	});
});






Route::get('/','PublicPageController@getIndex')->name('index');
Route::get('/index.html',function(){
	return redirect()->route('index');
});

Route::get('/san-pham/{sp}.html','PublicPageController@getChiTietPage')->name('sanpham');
Route::get('/{cm}/{lsp}.html','PublicPageController@getLoaiPage')->name('loai');
Route::get('/timkiem.html','PublicPageController@getTimKiem');

Route::get('/login.html','KhachHangController@getLogin');
Route::post('/login.html','KhachHangController@postLogin');

Route::get('/logout.html','KhachHangController@getLogout');

Route::get('/cart/{id}','KhachHangController@addCart');
Route::get('/remove/{id}','KhachHangController@removeProduct');
Route::get('/mycart.html','KhachHangController@getCart')->middleware('publicaccess');

//
Route::get('/profile.html','KhachHangController@getProfile')->middleware('publicaccess');
Route::post('/profile.html','KhachHangController@postProfile')->middleware('publicaccess');
Route::post('/checkout.html','KhachHangController@postCheckout')->middleware('publicaccess');
Route::get('/advertisment.html','QuanLiQuangCaoController@getAdvertisment')->middleware('publicaccess');
Route::get('/adver/{id}','QuangCaoController@getQuangCao')->middleware('publicaccess');
Route::post('/advertisment.html','QuangCaoController@postAdvertisment')->middleware('publicaccess');
Route::get('/myadvertisment.html','QuangCaoController@getMyAdvertisment')->middleware('publicaccess');
Route::get('/myadver/{id}','QuangCaoController@getMyQuangCao')->middleware('publicaccess');
Route::post('/myadvertisment.html','QuangCaoController@postMyQuangCao')->middleware('publicaccess');
Route::get('/setting.html','KhachHangController@getSetting')->middleware('publicaccess');
Route::post('/password.html','KhachHangController@postPassword')->middleware('publicaccess');
Route::get('/order.html','DonHangController@getOrder')->middleware('publicaccess');
Route::get('/{id}-orderdetail.html','ChiTietDonHangController@getOrderDetail')->middleware('publicaccess');
Route::get('/register.html','KhachHangController@getRegister');
Route::post('/register.html','KhachHangController@postRegister');
Route::post('/comment.html','BinhLuanController@postBinhLuan')->middleware('publicaccess');
Route::get('/forget.html','KhachHangController@getForget');
Route::post('/forget.html','KhachHangController@postForget');

Route::get('/mail.html','KhachHangController@getMail')->middleware('publicaccess');
Route::post('/mail.html','KhachHangController@postMail')->middleware('publicaccess');
Route::get('/2fa.html','KhachHangController@get2fa')->middleware('publicaccess');
Route::post('/2fa.html','KhachHangController@post2fa')->middleware('publicaccess');
Route::get('/login-2fa.html','KhachHangController@postLogin2fa');

