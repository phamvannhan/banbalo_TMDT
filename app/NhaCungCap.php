<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    //
    protected $table = 'nhacungcap';
    protected $fillable = ['ten','sdt','diachi','mail'];

    public function phieunhap(){
    	return $this->hasMany('App\PhieuNhap','id_ncc','id');
    }

    public function sanpham(){
    	return $this->hasMany('App\SanPham','id_ncc','id');
    }
}
