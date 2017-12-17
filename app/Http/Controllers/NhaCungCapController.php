<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaCungCap;

class NhaCungCapController extends Controller
{
    //

 	public function getDanhSach(){
 		$dsncc = NhaCungCap::paginate(5);
 		return view('admin.nhacungcap.danhsach',['dsncc'=>$dsncc]);
 	}

 	public function getThem(){
    	return view('admin.nhacungcap.them');
    }

    private function checkPost(Request $req, $id = ''){
        $this->validate($req,
            [
                'ten' => 'required|unique:nhacungcap,ten,'.$id,
                'sdt' => 'required',
                'diachi' => 'required',
                'mail' => 'required|email'
            ]
        );
    }

    public function postThem(Request $req){
    	$this->checkPost($req);
        return $this->addItem($req,'ncc');
    }

    public function getSua($id, Request $req){
    	$ncc = NhaCungCap::find($id);
    	return view('admin.nhacungcap.sua',['ncc'=>$ncc]);
    }

    public function postSua($id, Request $req){
        $this->checkPost($req,$id);
        return $this->editItem($req,'ncc',$id);
    }

    public function getXoa(Request $req){
       return $this->delItem($req,'ncc');
    }

    public function getLoad(Request $req){
        $type = $req->type;
        if($type = "chuyên mục"){
            $dscm = NhaCungCap::all('id','ten')->toArray();
            $result = '';
            foreach ($dscm as $key => $value) {
                $result .= '<option value="'.$value['id'].'">'.$value['ten'].'</option>';
            }
            echo $result;
        }

    }

    public function getTimKiem(Request $req){
        $dsncc = $this->search('ncc',$req->txtSearch)->paginate(5);
        $dsncc->appends(['txtSearch' => $req->txtSearch]);
        return view('admin.nhacungcap.danhsach',['dsncc'=>$dsncc]);
    }

}
