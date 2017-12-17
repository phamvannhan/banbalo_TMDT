<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiTietDonHang;

class ChiTietDonHangController extends Controller
{
    //
    public function getDanhSach(){
    	$dsctdh = ChiTietDonHang::paginate(5);
    	return view('admin.ctdh.danhsach',['dsctdh'=>$dsctdh]);
    }

    public function getOrderDetail($id){
    	$dsctdh = ChiTietDonHang::where('id_dh',$id)->get();
    	return view('orderdetail',['dsctdh'=>$dsctdh]);
    }

    public function getTimKiem(Request $req){
    	$dsctdh = $this->search('ctdh',$req->txtSearch)->paginate(5);
        $dsctdh->appends(['txtSearch' => $req->txtSearch]);
    	return view('admin.ctdh.danhsach',['dsctdh'=>$dsctdh]);
    }
}
