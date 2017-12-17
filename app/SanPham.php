<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $table = 'sanpham';
	protected $fillable = ['ten','slug','tukhoa','mota','noidung','anhdaidien','tacgia','dongia','khuyenmai','soluong','id_loai','id_ncc','trangthai'];

	public function loaisanpham(){
		return $this->belongsTo('App\LoaiSanPham','id_loai','id');
	}

	public function chitietdonhang(){
		return $this->hasMany('App\ChiTietDonHang','id_sp','id');
	}

	public function nguoidung(){
		return $this->belongsTo('App\NguoiDung','tacgia','id');
	}

	public function chitietphieunhap(){
		return $this->hasMany('App\ChiTietPhieuNhap','id_sp','id');
	}

	public function nhacungcap(){
		return $this->belongsTo('App\NhaCungCap','id_ncc','id');
	}

	public function binhluan(){
		return $this->hasMany('App\BinhLuan','id_sp','id');
	}
}
