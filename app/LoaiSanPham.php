<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    //
    protected $table = 'loaisanpham';
    protected $fillable = ['ten','slug','vitri','id_cm'];

    public function chuyenmuc(){
    	return $this->belongsTo('App\ChuyenMuc','id_cm','id');
    }

    public function sanpham(){
    	return $this->hasMany('App\SanPham','id_loai','id');
    }
}
