<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaiDat extends Model
{
    //
    protected $table = 'caidat';
    protected $fillable = ['ten','mota','keywords','trangthai','diachi','mail','sdt1','sdt2','sdt3'];
}
