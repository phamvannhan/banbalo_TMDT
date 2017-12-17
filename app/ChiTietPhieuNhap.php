<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuNhap extends Model
{
    //
    protected $table = 'chitietphieunhap';
    protected $fillable = ['id_sp','soluong','gianhap','id_pn'];

    public function phieunhap(){
    	return $this->belongsTo('App\PhieuNhap','id_pn','id');
    }

    public function sanpham(){
    	return $this->belongsTo('App\SanPham','id_sp','id');
    }
}
