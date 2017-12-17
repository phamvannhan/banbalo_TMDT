<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenMuc extends Model
{
    //
    protected $table = 'chuyenmuc';
    protected $fillable = ['ten','slug','vitri'];

    public function loaisanpham(){
    	return $this->hasMany('App\LoaiSanPham','id_cm','id');
    }

    public function sanpham(){
    	return $this->hasManyThrough('App\SanPham','App\LoaiSanPham','id_cm','id_loai');
    }
}
