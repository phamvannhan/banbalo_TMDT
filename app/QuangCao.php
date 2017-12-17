<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuangCao extends Model
{
    //
    protected $table = 'quangcao';
	protected $fillable = ['id_stripe','anh','href','mota','ngayconlai','id_kh','id_qc'];

	public function khachhang(){
		return $this->belongsTo('App\KhachHang','id_kh','id');
	}

	public function quanliquangcao(){
		return $this->belongsTo('App\QuanLiQuangCao','id_qc','id');
	}

}
