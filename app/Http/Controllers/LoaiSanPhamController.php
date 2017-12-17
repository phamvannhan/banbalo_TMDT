<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\ChuyenMuc;

class LoaiSanPhamController extends Controller
{
    //
    
    public function getDanhSach(){
    	$dsloai = LoaiSanPham::paginate(5);
    	return view('admin.loaisp.danhsach',['dsloai'=>$dsloai]);
    }

    public function getThem(){
    	$dscm = ChuyenMuc::select('id','ten')->get();
    	return view('admin.loaisp.them',['dscm'=>$dscm]);
    }

    private function checkPost(Request $req, $id = ''){
        $this->validate($req,
            [
                'ten' => 'required',
                'vitri' => 'required|unique:loaisanpham,vitri,'.$id,
                'id_cm' => 'required'
            ]
        );
    }

    public function postThem(Request $req){
    	$this->checkPost($req);
    	return $this->addItem($req,'lsp');
    }

    public function getSua($id){
    	$loai = LoaiSanPham::find($id);
    	$dscm = ChuyenMuc::all('id','ten');
    	return view('admin.loaisp.sua',['loai'=>$loai,'dscm'=>$dscm]);
    }

    public function postSua($id, Request $req){
        $this->checkPost($req,$id);
        return $this->editItem($req,'lsp',$id);
    }

    public function getXoa(Request $req){
    	return $this->delItem($req,'lsp');
    }

    public function getLoading(Request $req){
        return $this->getLoad($req);
    }

    public function getTimKiem(Request $req){
        $dsloai = $this->search('lsp',$req->txtSearch)->paginate(5);
        $dsloai->appends(['txtSearch' => $req->txtSearch]);
        return view('admin.loaisp.danhsach',['dsloai'=>$dsloai]);
    }

}
