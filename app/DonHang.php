<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    //
    protected $table = 'donhang';
    protected $fillable = ['id_stripe','tonggia','dchigiaohang','trangthai','id_kh'];

    public function chitietdonhang(){
    	return $this->hasMany('App\ChiTietDonHang','id_dh','id');
    }

    public function khachhang(){
    	return $this->belongsTo('App\KhachHang','id_kh','id');
    }

}
