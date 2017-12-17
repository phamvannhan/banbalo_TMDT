<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLiQuangCao;


class QuanLiQuangCaoController extends Controller
{
    //

    public function getDanhSach(){
    	$dsqlqc = QuanLiQuangCao::paginate(5);
    	return view('admin.qlqc.danhsach',['dsqlqc'=>$dsqlqc]);
    }


    private function checkPost(Request $req, $id = ''){
        $this->validate($req,
            [
                'gia' => 'required',
                'thoigian' => 'required'
            ]
        );
    }


    public function getSua($id){
        $qlqc = QuanLiQuangCao::find($id);
        return view('admin.qlqc.sua',['qlqc'=>$qlqc]);
    }

    public function postSua(Request $req, $id){
        $this->checkPost($req,$id);
        return $this->editItem($req,'qlqc',$id);
    }


    public function getChiTiet($id){
        $dsqc = QuanLiQuangCao::find($id)->quangcao()->paginate(5);
        return view('admin.qc.danhsach',['dsqc'=>$dsqc]);
    }

    public function getAdvertisment(){
        $dsqlqc = QuanLiQuangCao::all();
        return view('adver',['dsqlqc'=>$dsqlqc]);

    }

}
