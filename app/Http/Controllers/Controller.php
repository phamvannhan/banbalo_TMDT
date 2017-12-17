<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\ChuyenMuc;
use App\LoaiSanPham;
use App\NhaCungCap;
use App\QuanLiQuangCao;
use App\SanPham;
use App\Slide;
use App\CaiDat;
use App\KhachHang;
use App\QuangCao;
use App\NguoiDung;
use App\BinhLuan;
use App\DonHang;
use App\ChiTietPhieuNhap;
use App\ChiTietDonHang;
use App\PhieuNhap;
use Illuminate\Support\Facades\Hash;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function saveFile($path, Request $req){
    	$anh = $req->file('anh');
    	$now = getdate();
    	$year = $now['year'];
    	$day = $now['mday'];
    	$month = $now['mon'];
    	if(!is_dir($path.$year)){
    		mkdir($path.$year);
    	}
    	if(!is_dir($path.$year.'/'.$month)){
    		mkdir($path.$year.'/'.$month);
    	}
    	if(!is_dir($path.$year.'/'.$month.'/'.$day)){
    		mkdir($path.$year.'/'.$month.'/'.$day);
    	}
    	$dir = $path.$year.'/'.$month.'/'.$day.'/';
    	$name = str_random(3).'_'.$anh->getClientOriginalName();
    	while (file_exists($dir.$name)) {
    		$name = str_random(3)."_".$anh->getClientOriginalName();
    	}
    	$anh->move($dir,$name);
    	return $dir.$name;
    }

    public function getLoad(Request $req){
        $type = $req->type;
        $ds = array();
        if($type == 'cm'){
            $ds = ChuyenMuc::all('id','ten')->toArray();
        }
        if($type == 'lsp'){
            $ds = LoaiSanPham::all('id','ten')->toArray();
        } 
        if($type == 'ncc'){
            $ds = NhaCungCap::all('id','ten')->toArray();
        }
        if($type == 'sp'){
            $ds = SanPham::where('id_ncc',$req->id)->get()->toArray();
        }
        $result = '';
        foreach ($ds as $key => $value) {
            $result .= '<option value="'.$value['id'].'">'.$value['ten'].'</option>';
        }
        echo $result;

    }

    public function addItem(Request $req, $type){
        if($type == 'cm'){
            ChuyenMuc::create($req->all());
            return back()->with('thongbao','Thêm chuyên mục thành công') ;      
        }
        if($type == 'lsp'){
            LoaiSanPham::create($req->all());
            return back()->with('thongbao','Thêm loại sản phẩm thành công');       
        }
        if($type == 'ncc'){
            NhaCungCap::create($req->all());
            return back()->with('thongbao','Thêm nhà cung cấp thành công');     
        }
        if($type == 'qlqc'){
            QuanLiQuangCao::create($req->all());
            return back()->with('thongbao','Thêm quảng cáo thành công');       
        }
        if($type == 'nd'){
            NguoiDung::create($req->all());
            return back()->with('thongbao','Thêm người dùng thành công');       
        }
        if($type == 'kh'){
            KhachHang::create($req->all());
            return back()->with('thongbao','Tạo tài khoản thành công');       
        }
        if($type == 'bl'){
            BinhLuan::create($req->all());
            return back()->with('thongbao','Gửi bình luận thành công');       
        }
        return back()->with('thongbao','Đả xảy ra lỗi');
    }

    public function editItem(Request $req, $type, $id){
        if($type == 'cm'){
            ChuyenMuc::find($id)->update($req->all());
            return back()->with('thongbao','Sửa chuyên mục thành công') ;      
        }
        if($type == 'lsp'){
            LoaiSanPham::find($id)->update($req->all());
            return back()->with('thongbao','Sửa loại sản phẩm thành công');       
        }
        if($type == 'ncc'){
            NhaCungCap::find($id)->update($req->all());
            return back()->with('thongbao','Sửa nhà cung cấp thành công')  ;     
        }
        if($type == 'qlqc'){
            QuanLiQuangCao::find($id)->update($req->all());
            return back()->with('thongbao','Sửa quảng cáo thành công');       
        }
        if($type == 'sp'){
            SanPham::find($id)->update($req->all());
            return back()->with('thongbao','Sửa sản phẩm thành công');      
        }
        if($type == 'cd'){
            CaiDat::find($id)->update($req->all());
            return back()->with('thongbao','Cập nhật cài đặt thành công') ;      
        }
        if($type == 'ndchucvu'){
            NguoiDung::find($id)->update(['chucvu'=>$req->chucvu]);
            return back()->with('thongbao','Sửa chức vụ thành công') ;      
        }
        if($type == 'ndpro'){
            NguoiDung::find($id)->update(['ten'=>$req->ten,'diachi'=>$req->diachi,'sdt1'=>$req->sdt1,'sdt2'=>$req->sdt2,'sdt3'=>$req->sdt3]);
            return back()->with('thongbao','Sửa profile thành công') ;      
        }
        if($type == 'ndpass'){
            NguoiDung::find($id)->update(['password'=>$req->newpassword]);
            return back()->with('thongbao','Sửa mật khẩu thành công') ;      
        }
        if($type == 'kh'){
            KhachHang::find($id)->update(['ten'=>$req->ten,'sodienthoai'=>$req->sodienthoai,'mail'=>$req->mail,'diachi'=>$req->diachi]);
            return back()->with('thongbao','Sửa thông tin tài khoản thành công') ;     
        }
        if($type == 'khpass'){
            KhachHang::find($id)->update(['password'=>$req->newpassword]);
            return back()->with('thongbao','Sửa mật khẩu thành công') ;      
        }
 
        return back()->with('thongbao','Đả xảy ra lỗi');
    }

    public function delItem(Request $req, $type){
        $kind = $req->type;
        $id = $req->id;
        if($kind == 1){
            switch ($type) {
                case 'cm':
                    ChuyenMuc::find($id)->delete(); break;
                case 'kh':
                    KhachHang::find($id)->delete(); break;
                case 'lsp':
                    LoaiSanPham::find($id)->delete(); break;
                case 'ncc':
                    NhaCungCap::find($id)->delete(); break;
                case 'qlqc':
                    QuanLiQuangCao::find($id)->delete(); break;
                case 'sp':
                    SanPham::find($id)->delete(); break;
                case 'sli':
                    Slide::find($id)->delete(); break;
                case 'qc':
                    QuangCao::find($id)->delete(); break;
                case 'nd':
                    NguoiDung::find($id)->delete(); break;
                case 'bl':
                    BinhLuan::find($id)->delete(); break;
                case 'dh':
                    DonHang::find($id)->delete(); break;
                case 'pn':
                    PhieuNhap::find($id)->delete(); break;        
            }
            echo 'Xóa thành công';
        }elseif($kind == 0){
            switch ($type) {
                case 'cm':
                    ChuyenMuc::whereIn('id',$req->id)->delete(); break;
                case 'kh':
                    KhachHang::whereIn('id',$req->id)->delete(); break;
                case 'lsp':
                    LoaiSanPham::whereIn('id',$req->id)->delete(); break;
                case 'ncc':
                    NhaCungCap::whereIn('id',$req->id)->delete(); break;
                case 'qlqc':
                    QuanLiQuangCao::whereIn('id',$req->id)->delete(); break;
                case 'sp':
                    SanPham::whereIn('id',$req->id)->delete(); break;
                case 'sli':
                    Slide::whereIn('id',$req->id)->delete(); break;
                case 'qc':
                    QuangCao::whereIn('id',$req->id)->delete(); break;
                case 'nd':
                    NguoiDung::whereIn('id',$req->id)->delete(); break;
                case 'bl':
                    BinhLuan::whereIn('id',$req->id)->delete(); break;
                case 'dh':
                    DonHang::whereIn('id',$req->id)->delete(); break;
                case 'pn':
                    PhieuNhap::whereIn('id',$req->id)->delete(); break;
            }
            echo 'Xóa thành công';
        }
    }

    public function editStatus(Request $req){
        $type = $req->type;
        $id = $req->id;
        $stt = $req->stt;
        if(!is_array($id)){
            switch ($type) {
            case 'nd':
                NguoiDung::find($id)->update(['trangthai'=>$stt]);
                break;
            case 'dh':
                DonHang::find($id)->update(['trangthai'=>$stt+1]);
                break;

            }
        }else{
            switch ($type) {
            case 'nd':
                NguoiDung::whereIn('id',$id)->update(['trangthai'=>$stt]);
                break;

            }
        }
        
        echo 'Cập nhật trạng thái thành công';
    }

    public function checkMatchPassword($new, $old){
        if(!Hash::check($new,$old)){
           return false;
        }
        return true;
    }


    public function checkChangePassword(Request $req){
        $this->validate($req,
            [
                'newpassword' => 'required|min:6',
                'newrepassword' => 'required|min:6|same:newpassword',
            ]
        );
    }

    public function updateProductQuantity($id, $quantity){
        $sp = SanPham::find($id);
        $sp->soluong = $sp->soluong - $quantity;
        $sp->save();
    }

    private function toArray($arr){
        $array = array();
        foreach ($arr as $key => $value) {
            array_push($array, $value['id']);
        }
        return $array;
    }

    public function search($type, $value, $kind = 'all'){
        $result = array();
        $id_author = array();
        $id_kh = array();
        $id_sp = array();
        $id_cm = array();
        $id_ncc = array();

        if(is_string($value)){
            $id_author = $this->toArray(NguoiDung::where('ten','like','%'.$value.'%')->get()->toArray());
            $id_kh = $this->toArray(KhachHang::where('ten','like','%'.$value.'%')->get()->toArray());
            $id_sp = $this->toArray(SanPham::where('ten','like','%'.$value.'%')->get()->toArray());
            $id_cm = $this->toArray(ChuyenMuc::where('ten','like','%'.$value.'%')->get()->toArray());
            $id_ncc = $this->toArray(NhaCungCap::where('ten','like','%'.$value.'%')->get()->toArray());
        }

        switch ($type) {
            case 'sp': 
                $result = SanPham::where('id',$value)->orWhere('ten','like','%'.$value.'%')->orWhere('dongia',$value)->orWhereIn('tacgia',$id_author);
                break;
            
            case 'dh':
                $result = DonHang::where('id',$value)->orWhere('id_stripe','like','%'.$value.'%')->orWhere('tonggia',$value)->orWhere('dchigiaohang','like','%'.$value.'%')->orWhereIn('id_kh',$id_kh);
                break;

            case 'ctdh':
                $result = ChiTietDonHang::where('id',$value)->orWhereIn('id_sp',$id_sp)->orWhere('dongia',$value)->orWhere('id_dh',$value);
                break;

            case 'kh':
                $result = KhachHang::where('id',$value)->orWhere('username','like','%',$value.'%')->orWhere('ten','like','%'.$value.'%')->orWhere('diachi','like','%'.$value.'%')->orWhere('sodienthoai','like','%'.$value.'%')->orWhere('mail','like','%'.$value.'%');
                break;

            case 'bl':
                $result = BinhLuan::where('id',$value)->orWhereIn('id_kh',$id_kh)->orWhereIn('id_sp',$id_sp);
                break;

            case 'lsp':
                $result = LoaiSanPham::where('id',$value)->orWhere('ten','like','%'.$value.'%')->orWhereIn('id_cm',$id_cm);
                break;

            case 'pn':
                $result = PhieuNhap::where('id',$value)->orWhereIn('id_ncc',$id_ncc)->orWhere('tonggia',$value);
                break;

            case 'ctpn':
                $result = ChiTietPhieuNhap::where('id',$value)->orWhereIn('id_sp',$id_sp)->orWhere('gianhap',$value)->orWhere('id_pn',$value);
                break;

            case 'ncc':
                $result = NhaCungCap::where('id',$value)->orWhere('ten','like','%'.$value.'%')->orWhere('sdt','like','%'.$value.'%')->orWhere('diachi','like','%'.$value.'%')->orWhere('mail','like','%'.$value.'%');
                break;

            case 'cm':
                $result = ChuyenMuc::where('id',$value)->orWhere('ten','like','%'.$value.'%');
                break;

            case 'qc':
                $result = QuangCao::where('id',$value)->orWhere('id_stripe','like','%'.$value.'%')->orWhereIn('id_kh',$id_kh)->orWhere('id_qc',$value);
                break;

            case 'nd':
                $result = NguoiDung::Where('id',$value)->orWhere('username','like','%',$value.'%')->orWhere('ten','like','%'.$value.'%')->orWhere('diachi','like','%'.$value.'%')->orWhere('sdt1','like','%'.$value.'%')->orWhere('sdt2','like','%'.$value.'%')->orWhere('sdt3','like','%'.$value.'%')->orWhere('mail','like','%'.$value.'%');
                break;

            case 'sli':
                $result = Slide::where('id',$value);
                break;

            case 'pub':
                if($kind !== 'all'){
                    $result = SanPham::where('id_loai',$kind)->where('id',$value)->orWhere('ten','like','%'.$value.'%')->where('id_loai',$kind)->orWhere('tukhoa','like','%'.$value.'%')->where('id_loai',$kind)->orWhere('dongia',$value)->where('id_loai',$kind);
                }else{
                    $result = SanPham::where('id',$value)->orWhere('ten','like','%'.$value.'%')->orWhere('tukhoa','like','%'.$value.'%')->orWhere('dongia',$value);
                }
                break;
        }
        return $result;
    }

}
