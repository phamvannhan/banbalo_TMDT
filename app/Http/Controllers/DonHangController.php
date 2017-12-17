<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonHang;
use Illuminate\Support\Facades\Auth;


class DonHangController extends Controller
{
    //
	public function getDanhSach(){
		$dsdh = DonHang::paginate(5);
    	return view('admin.donhang.danhsach',['dsdh'=>$dsdh]);
	}

	public function getChiTiet($id){
		$dsctdh = DonHang::find($id)->chitietdonhang()->paginate(5);
		return view('admin.donhang.chitiet',['dsctdh'=>$dsctdh]);
	}

	public function changeStatus(Request $req){
		return $this->editStatus($req);
	}

	public function getOrder(){
		$id = Auth::user()['id'];
		$dsdh = DonHang::where('id_kh',$id)->paginate(10);
		return view('order',['dsdh'=>$dsdh]);
	}

	public function getTimKiem(Request $req){
		$dsdh = $this->search('dh',$req->txtSearch)->paginate(5);
		$dsdh->appends(['txtSearch' => $req->txtSearch]);
		return view('admin.donhang.danhsach',['dsdh'=>$dsdh]);
	}
 
}
