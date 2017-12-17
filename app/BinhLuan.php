<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    protected $table = 'binhluan';
    protected $fillable = ['noidung','id_kh','id_nd','id_sp','id_parent'];

    public function khachhang(){
    	return $this->belongsTo('App\KhachHang','id_kh','id');
    }

    public function nguoidung(){
    	return $this->belongsTo('App\NguoiDung','id_nd','id');
    }

    public function sanpham(){
    	return $this->belongsTo('App\SanPham','id_sp','id');
    }
}
