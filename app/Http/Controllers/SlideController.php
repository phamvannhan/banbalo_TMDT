<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //

    public function getDanhSach(){
    	$dssli = Slide::paginate(5);
    	return view('admin.slide.danhsach',['dssli'=>$dssli]);
    }

    public function getThem(){
    	return view('admin.slide.them');
    }

    private function checkPost(Request $req){
        $this->validate($req,
            [
                'anh' => 'required',
                'href' => 'required|url'
            ]
        );
    }

    public function postThem(Request $req){
        $this->checkPost($req);
        Slide::create(['anh'=>$this->saveFile('upload/slide/',$req),'href'=>$req->href]);
        return back()->with('thongbao','Thêm slide thành công');  
    }

    public function getSua($id, Request $req){
    	$sli = Slide::find($id);
    	return view('admin.slide.sua',['sli'=>$sli]);
    }

    public function postSua($id, Request $req){
        $sli = Slide::find($id);
        $sli->href = $req->href;
        if($req->file('anh')){
            $sli->anh = $this->saveFile('upload/slide/',$req);
        }
        $sli->save();
        return back()->with('thongbao','Sửa Slide thành công');
    }

    public function getXoa(Request $req){
       return $this->delItem($req,'sli');
    }

    public function getTimKiem(Request $req){
        $dssli = $this->search('sli',$req->txtSearch)->paginate(5);
        $dssli->appends(['txtSearch' => $req->txtSearch]);
        return view('admin.slide.danhsach',['dssli'=>$dssli]);
    }
}
