<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\SanPham;
use App\ChuyenMuc;
use App\QuangCao;
use App\LoaiSanPham;
use App\CaiDat;
use DB;
use App\Events\IncrementViewEvent;

class PublicPageController extends Controller
{


    private function getBannerQuangCao($type = 0){
        $where = '';
        $dsid_qc = array();
        if($type == 1){
            $where = 'WHERE id_qc = 11 OR id_qc = 12';
        }
        $sql_max = "SELECT id_qc, MIN(ngayconlai) as maxngay FROM quangcao ".$where." GROUP BY id_qc";
        $result_max = DB::select($sql_max);
        $dsqc = QuangCao::all();
        foreach ($dsqc as $key => $value) {
            foreach ($result_max as $key_max => $value_max) {
                if($value->id_qc == $value_max->id_qc && $value->ngayconlai == $value_max->maxngay)
                    array_push($dsid_qc, $value->id);
            }
        }
        return $dsid_qc;
    }

    public function getIndex(){
        $title = CaiDat::all('ten')->first()['ten'];
    	$dssli = Slide::all();
    	$dscm = ChuyenMuc::all();
    	$dsnew = SanPham::where('trangthai',1)->orderBy('created_at','DESC')->limit(8)->get();
		$dssale = SanPham::where('khuyenmai','>',0)->where('trangthai',1)->orderBy('created_at','DESC')->limit(8)->get();
        $dsid_qc = $this->getBannerQuangCao(); 
        $dsqc = QuangCao::whereIN('id',$dsid_qc)->orderBy('id_qc')->get();
    	return view('homepage',['dssli'=>$dssli,'dssale'=>$dssale,'dsnew'=>$dsnew,'dscm'=>$dscm,'dsqc'=>$dsqc,'title'=>$title]);
    }

    public function getChiTietPage($sp){
    	$id = explode('-', $sp)[0];
        $sp = SanPham::where('id',$id)->where('trangthai',1)->first();
    	$dssp = SanPham::where('id_loai',$sp->id_loai)->where('id','!=',$id)->get();
    	$dsnew = SanPham::orderBy('created_at','DESC')->limit(8)->get();
		$dssale = SanPham::where('khuyenmai','>',0)->orderBy('created_at','DESC')->limit(8)->get();
        $dsid_qc = $this->getBannerQuangCao(1); 
        $dsqc = QuangCao::whereIN('id',$dsid_qc)->orderBy('id_qc')->get();

        event(new IncrementViewEvent($sp));

    	return view('detail',['sp'=>$sp,'dssale'=>$dssale,'dsnew'=>$dsnew,'dssp'=>$dssp,'dsqc'=>$dsqc]);
    }

    public function getLoaiPage($cm, $lsp){
    	$loai = LoaiSanPham::where('slug',$lsp)->get()->first()->toArray();
    	$dssp = SanPham::where('id_loai',$loai['id'])->where('trangthai',1)->get();
    	$dsnew = SanPham::where('trangthai',1)->orderBy('created_at','DESC')->limit(8)->get();
		$dssale = SanPham::where('khuyenmai','>',0)->where('trangthai',1)->orderBy('created_at','DESC')->limit(8)->get();
        $dsid_qc = $this->getBannerQuangCao(1); 
        $dsqc = QuangCao::whereIN('id',$dsid_qc)->orderBy('id_qc')->get();
    	return view('catepage',['dssp'=>$dssp,'tenloai'=>$loai['ten'],'dssale'=>$dssale,'dsnew'=>$dsnew,'dsqc'=>$dsqc]);
    }

    
    public function getTimKiem(Request $req){
        $dssp = $this->search('pub',$req->txtSearch,$req->type)->paginate(5);
        $dssp->appends(['txtSearch'=>$req->txtSearch,'type'=>$req->type]);
        if($req->type == 'all'){
            $tenloai = 'TẤT CẢ';
        }else{
            $tenloai = LoaiSanPham::where('id',$req->type)->get()->first()->toArray()['ten'];
        }
        $dsnew = SanPham::where('trangthai',1)->orderBy('created_at','DESC')->limit(8)->get();
        $dssale = SanPham::where('khuyenmai','>',0)->where('trangthai',1)->orderBy('created_at','DESC')->limit(8)->get();
        $dsid_qc = $this->getBannerQuangCao(1); 
        $dsqc = QuangCao::whereIN('id',$dsid_qc)->orderBy('id_qc')->get();
        return view('catepage',['dssp'=>$dssp,'tenloai'=>$tenloai,'dssale'=>$dssale,'dsnew'=>$dsnew,'dsqc'=>$dsqc]);
    }
   	

   	
}
