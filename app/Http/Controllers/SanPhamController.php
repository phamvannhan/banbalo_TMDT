<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\LoaiSanPham;
use App\NhaCungCap;
use Session;


class SanPhamController extends Controller
{
    //
    public function getDanhSach(){
    	$dssp = SanPham::paginate(5);
    	return view('admin.sanpham.danhsach',['dssp'=>$dssp]);
    }

    public function getThem(){
    	$dsncc = NhaCungCap::select('id','ten')->get();
    	$dsloai = LoaiSanPham::select('id','ten')->get();
    	return view('admin.sanpham.them',['dsncc'=>$dsncc,'dsloai'=>$dsloai]);
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'ten' => 'required|unique:sanpham,ten',
    			'tukhoa' => 'required',
    			'mota' => 'required|max:180|min:170',
    			'anh' => 'required',
    			'dongia' => 'required',
    			'khuyenmai' => 'required',
    			// 'soluong' => 'required',
    			'loai' => 'required',
    			'ncc' => 'required',
    			'trangthai' => 'required',
    			'noidung' => 'required'
    		]
    	);
    	$sp =  new SanPham();
    	$sp->ten = $req->ten;
    	$sp->slug = $req->slug;
    	$sp->tukhoa = $req->tukhoa;
    	$sp->mota = $req->mota;
    	$sp->noidung = $req->noidung;
    	$sp->anhdaidien = $this->saveFile('upload/sanpham/',$req);
    	$sp->tacgia = Session::get('nd')->id;
    	$sp->dongia = $req->dongia;
    	$sp->khuyenmai = $req->khuyenmai;
    	$sp->id_loai = $req->loai;
    	$sp->id_ncc = $req->ncc;
    	$sp->trangthai = $req->trangthai;
    	$sp->save();
    	return back()->with('thongbao','Thêm sản phẩm thành công');
    }

    public function getSua($id){
    	$sp = SanPham::find($id);
    	$dsloai = LoaiSanPham::select('id','ten')->get();
    	$dsncc = NhaCungCap::select('id','ten')->get();
    	return view('admin.sanpham.sua',['sp'=>$sp,'dsloai'=>$dsloai,'dsncc'=>$dsncc]);
    }

    public function postSua(Request $req, $id){
        $this->validate($req,
            [
                'ten' => 'required|unique:sanpham,ten,'.$id,
                'tukhoa' => 'required',
                'mota' => 'required|max:180|min:170',
                'dongia' => 'required',
                'khuyenmai' => 'required',
                //'soluong' => 'required',
                'loai' => 'required',
                'ncc' => 'required',
                'trangthai' => 'required',
                'noidung' => 'required'
            ]
        );
        return $this->editItem($req,'sp',$id);
    }

    public function getAnh($id){
        $anh = SanPham::select('id','anhdaidien')->find($id)->toArray();
        return view('admin.sanpham.anh',['anh'=>$anh]);
    }

    public function postAnh(Request $req, $id){
        $this->validate($req,
            [
                'anh' => 'required',
            ]
        );
        SanPham::find($id)->update(['anhdaidien'=>$this->saveFile('upload/sanpham/',$req)]);
        return back()->with('thongbao','Sửa ảnh đại diện thành công');
    }

    public function getXoa(Request $req){
    	return $this->delItem($req,'sp');
    }

    public function getBinhLuan($id){
        $dsbl = SanPham::find($id)->binhluan()->paginate(5);
        return view('admin.sanpham.binhluan',['dsbl'=>$dsbl]);

    }

    public function getLoading(Request $req){
        return $this->getLoad($req);
    }

    public function getSale(Request $req){
        $type = $req->type;
        if($type == 0){
            $dssp = SanPham::all('id')->toArray();
            foreach ($dssp as $key => $value) {
                $sp = SanPham::where('id',$value['id'])->update(['khuyenmai'=>$req->value]);
            }
        }elseif($type == 1){
            $sp = SanPham::whereIn('id',$req->id)->update(['khuyenmai'=>$req->value]);
        }
        if($sp){
            echo "Sale sản phẩm thành công";
        }else{
            echo "Đã có lỗi xảy ra";
        }
    }

    public function getTimKiem(Request $req){
        $dssp = $this->search('sp',$req->txtSearch)->paginate(5);
        $dssp->appends(['txtSearch' => $req->txtSearch]);
        return view('admin.sanpham.danhsach',['dssp'=>$dssp]);
    }
}
