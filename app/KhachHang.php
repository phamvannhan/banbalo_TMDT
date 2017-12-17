<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    //
    protected $table = 'khachhang';
    protected $fillable = ['username','password','ten','diachi','sodienthoai','mail','loaikh','otp'];

    public function donhang(){
    	return $this->hasMany('App\DonHang','id_kh','id');
    }

    public function quangcao(){
    	return $this->hasMany('App\QuangCao','id_kh','id');
    }

    public function binhluan(){
    	return $this->hasMany('App\BinhLuan','id_kh','id');
    }

    public function otp(){
        return $this->belongsTo('App\Otp','id_otp','id');
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

}
