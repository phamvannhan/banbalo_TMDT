<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuNhap;
use App\ChiTietPhieuNhap;
use App\NhaCungCap;
use App\SanPham;


class PhieuNhapController extends Controller
{
    //
    private function addPN($id_ncc, $tonggia, $ngaydat){
      $pn = new PhieuNhap();
      $pn->id_ncc = $id_ncc;
      $pn->tonggia = $tonggia;
      $pn->ngaydat = $ngaydat;
      $pn->save();
      return $pn;
    }

    private function addCTPN($id_sp, $soluong, $gianhap, $id_pn){
      for($i = 0; $i < count($id_sp); $i++){
        $ctpn = new ChiTietPhieuNhap();
        $ctpn->id_sp = $id_sp[$i];
        $ctpn->soluong = $soluong[$i];
        $ctpn->gianhap = $gianhap[$i];
        $ctpn->id_pn = $id_pn;
        $ctpn->save();
        $this->updateProductQuantity($id_sp[$i],(-$soluong[$i]));
      }
    }

    public function getDanhSach(){
    	$dspn = PhieuNhap::paginate(5);
    	return view('admin.phieunhap.danhsach',['dspn'=>$dspn]);
    }
    public function getThem(){
    	$dsncc = NhaCungCap::all('id','ten');
    	return view('admin.phieunhap.them',['dsncc'=>$dsncc]);
    }

    public function getXoa(Request $req){
    	return $this->delItem($req,'pn');
    }	


    public function getLoading(Request $req){
        return $this->getLoad($req);
    }

    public function storeCTPN(Request $req){
        $id_sp = $req->id_sp;
        $soluong = $req->soluong;
        $gianhap = $req->gianhap;
        $id_ncc = $req->id_ncc;
        $tonggia = $req->tonggia;
        $ngaydat = $req->ngaydat;
        if($req->type == 0){
          $string = "";
          for($i = 0; $i < count($id_sp); $i++){
            $string .= '<tr class="odd gradeX">';
            $string .= '<td>'.SanPham::find($id_sp[$i])->ten.'</td>';
            $string .= '<td>'.$soluong[$i].'</td>';
            $string .= '<td>'.$gianhap[$i].'</td>';
            $string .= '</tr>';
          }
          echo $string;
        }else{
          $pn = $this->addPN($id_ncc,$tonggia,$ngaydat);
          $this->addCTPN($id_sp,$soluong,$gianhap,$pn->id);
        }
    }

    public function getChiTiet($id){
      $dsctpn = PhieuNhap::find($id)->chitietphieunhap()->paginate(5);
      return view('admin.phieunhap.chitiet',['dsctpn'=>$dsctpn]);
    }

    public function getTimKiem(Request $req){
      $dspn = $this->search('pn',$req->txtSearch)->paginate(5);
      $dspn->appends(['txtSearch' => $req->txtSearch]);
      return view('admin.phieunhap.danhsach',['dspn'=>$dspn]);
    }
}
