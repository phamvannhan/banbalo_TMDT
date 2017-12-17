<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class NguoiDung extends Authenticatable
{
    //
    protected $table = 'nguoidung';

    protected $guard = 'nguoidung';

    protected $fillable = ['username','password','ten','chucvu','diachi','sdt1','sdt2','sdt3','mail','trangthai'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sanpham(){
    	return $this->hasMany('App\SanPham','tacgia','id');
    }

    public function binhluan(){
        return $this->hasMany('App\BinhLuan','id_nd','id');
    }

    public function setPasswordAttribute($value){
    	$this->attributes['password'] = Hash::make($value);
	}
}
