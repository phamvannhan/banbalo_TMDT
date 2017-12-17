<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    //
    protected $table = 'phieunhap';
    protected $fillable = ['id_ncc','tonggia','ngaydat'];

    public function chitietphieunhap(){
    	return $this->hasMany('App\ChiTietPhieuNhap','id_pn','id');
    }

    public function nhacungcap(){
    	return $this->belongsTo('App\NhaCungCap','id_ncc','id');
    }
}
