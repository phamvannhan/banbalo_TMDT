<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuyenMuc;

class ChuyenMucController extends Controller
{
    //

    public function getDanhSach(){
        $dscm = ChuyenMuc::paginate(5);
    	return view('admin.chuyenmuc.danhsach',['dscm'=>$dscm]);
    }

    public function getThem(){
    	return view('admin.chuyenmuc.them');
    }

    private function checkPost(Request $req, $id = ''){
        $this->validate($req,
            [
                'ten' => 'required|unique:chuyenmuc,ten,'.$id,
                'vitri' => 'required|unique:chuyenmuc,vitri,'.$id
            ]
        );
    }

    public function postThem(Request $req){
    	$this->checkPost($req);
        return $this->addItem($req,'cm');

    }

    public function getSua($id){
    	$cm = ChuyenMuc::find($id);
    	return view('admin.chuyenmuc.sua',['cm'=>$cm]);
    }

    public function postSua($id, Request $req){
        $this->checkPost($req,$id);
        return $this->editItem($req,'cm',$id);
    }

    public function getXoa(Request $req){
    	return $this->delItem($req,'cm');
    }

    public function getTimKiem(Request $req){
        $dscm = $this->search('cm',$req->txtSearch)->paginate(5);
        $dscm->appends(['txtSearch' => $req->txtSearch]);
        return view('admin.chuyenmuc.danhsach',['dscm'=>$dscm]);
    }


}
