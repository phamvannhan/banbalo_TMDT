<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    //
    protected $table = 'chitietdonhang';
    protected $fillable = ['id_sp','soluong','dongia','id_dh'];

    public function sanpham(){
    	return $this->belongsTo('App\SanPham','id_sp','id');
    }

    public function donhang(){
    	return $this->belongsTo('App\DonHang','id_dh','id');
    }
}
