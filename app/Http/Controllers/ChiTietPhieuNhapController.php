<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiTietPhieuNhap;

class ChiTietPhieuNhapController extends Controller
{
    //

    public function getDanhSach(){
    	$dsctpn = ChiTietPhieuNhap::paginate(5);
    	return view('admin.ctpn.danhsach',['dsctpn'=>$dsctpn]);
    }

    public function getTimKiem(Request $req){
    	$dsctpn = $this->search('ctpn',$req->txtSearch)->paginate(5);
    	$dsctpn->appends(['txtSearch' => $req->txtSearch]);
    	return view('admin.ctpn.danhsach',['dsctpn'=>$dsctpn]);
    }
}
