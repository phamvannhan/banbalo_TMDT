<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BinhLuan;
use App\SanPham;


class BinhLuanController extends Controller
{
    //

    public function getDanhSach(){
    	$dsbl = BinhLuan::paginate(5);
    	return view('admin.binhluan.danhsach',['dsbl'=>$dsbl]);
    }

    public function getXoa(Request $req){
    	return $this->delItem($req,'bl');
    }

    public function getTimKiem(Request $req){
    	$dsbl = $this->search('bl',$req->txtSearch)->paginate(5);
        $dsbl->appends(['txtSearch' => $req->txtSearch]);
    	return view('admin.binhluan.danhsach',['dsbl'=>$dsbl]);
    }

    public function postBinhLuan(Request $req){
        return $this->addItem($req,'bl');
    }

    public function getChiTiet(Request $req){
        $bl = BinhLuan::where('id',$req->id)->first(); 
        $sp = SanPham::where('id',$bl->id_sp)->first();
        return view('admin.binhluan.chitiet',['sp'=>$sp]);
    }

}
