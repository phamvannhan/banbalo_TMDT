<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuangCao;
use App\CaiDat;
use App\QuanLiQuangCao;
use Stripe\Stripe;
use Stripe\Charge;
use DB;
use Illuminate\Support\Facades\Auth;

class QuangCaoController extends Controller
{
    //

    private function checkPost(Request $req){
        $this->validate($req,
            [
                'anh' => 'required',
                'href' => 'required|url',
                'mota' => 'required'
            ]
        );
    }
    private function addDay(Request $req){
        $addDay = QuanLiQuangCao::find($req->id_qc)->toArray()['thoigian'];
        $sql = "SELECT MAX(ngayconlai) as ab FROM quangcao WHERE id_qc = ".$req->id_qc;
        $dsqc = DB::select($sql);
        $day = strtotime(date("Y-m-d", strtotime($dsqc[0]->ab)) . " +".$addDay." day");
        $day = strftime("%Y-%m-%d",$day); 
        return $day;
    }

    private function addQuangCao(Charge $charge,Request $req, $addDay){
        $qc = new QuangCao();
        $qc->id_stripe = $charge->id;
        $qc->anh = $this->saveFile('upload/quangcao/',$req); 
        $qc->href = $req->href;
        $qc->mota = $req->mota;
        $qc->ngayconlai = $addDay;
        $qc->id_qc = $req->id_qc;
        $qc->id_kh = $req->id_kh;
        $qc->save();
        return $qc;
    }

    public function getDanhSach(){
    	$dsqc = QuangCao::paginate(5);
    	return view('admin.qc.danhsach',['dsqc'=>$dsqc]);
    }

    public function getXoa(Request $req){
    	return $this->delItem($req,'qc');
    }

    public function getQuangCao($id){
    	$title = CaiDat::all('ten')->first()['ten'];
    	$qlqc = QuanLiQuangCao::find($id);
    	return view('addadver',['title'=>$title,'qlqc'=>$qlqc]);
    }

    public function postAdvertisment(Request $req){
        $this->checkPost($req);

        Stripe::setApiKey('sk_test_RtmMcqihCx3YN6NSN70n3V9o');
        $token  = $req->stripeToken;
        $gia = QuanLiQuangCao::find($req->id_qc)->toArray()['gia'];
        $charge = Charge::create(array(
            'source' => $token,
            'amount'   => $gia,
            'currency' => 'vnd',
        ));

        $addDay = $this->addDay($req);
        $qc = $this->addQuangCao($charge, $req, $addDay);
        if($qc){
            return redirect()->route('index');
        }
        return back()->with('thongbao','Có lỗi xãy ra');
        
    }

    public function getMyAdvertisment(){
        $id_kh = Auth::user()->id;
        $dsqc = QuangCao::where('id_kh',$id_kh)->get();
        return view('myadver',['dsqc'=>$dsqc]);
    }

    public function getMyQuangCao($id){
        $qc = QuangCao::find($id);
        return view('editadver',['qc'=>$qc]);
    }

    public function postMyQuangCao(Request $req){
        $this->validate($req,
            [
                'href'=>'required|url',
                'mota'=>'required'
            ]
        );
        $qc = QuangCao::find($req->id);
        if($req->anh){
            $qc->anh = $this->saveFile('upload/quangcao/',$req);
        }
        $qc->href = $req->href;
        $qc->mota = $req->mota;
        $qc->save();
        return back();
    }

    public function getTimKiem(Request $req){
        $dsqc = $this->search('qc',$req->txtSearch)->paginate(5);
        $dsqc->appends(['txtSearch' => $req->txtSearch]);
        return view('admin.qc.danhsach',['dsqc'=>$dsqc]);
    } 
}
