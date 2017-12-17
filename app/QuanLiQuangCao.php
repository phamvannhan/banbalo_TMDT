<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLiQuangCao extends Model
{
    //
    protected $table = 'quanliquangcao';
    protected $fillable = ['gia','thoigian'];

    public function quangcao(){
    	return $this->hasMany('App\QuangCao','id_qc','id');
    }
}
