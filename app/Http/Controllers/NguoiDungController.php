<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiDung;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Http\Controllers\Controller;
use Igoshev\Captcha\Facades\Captcha;

class NguoiDungController extends Controller
{
    //

    // public function __construct(){
    //  $this->middleware('guest:nguoidung');
    // }

	private function checkPost(Request $req, $id = ''){
		$this->validate($req,
			[
				'username' => 'required|unique:nguoidung,username,'.$id,
				'password' => 'required|min:6',
				'password_confirmation' => 'required|same:password',
				'ten' => 'required',
				'chucvu' => 'required|numeric',
				'diachi' => 'required',
				'sdt1' => 'required',
				'sdt2' => 'required',
				'sdt3' => 'required',
				'mail' => 'required|email|unique:nguoidung,mail,'.$id,
				'trangthai' => 'required|numeric'
			]
		);
	}


    public function getDanhSach(){
    	$dsnd = NguoiDung::where('id','!=',Auth::guard('nguoidung')->user()->id)->paginate(5);
    	return view('admin.nguoidung.danhsach',['dsnd'=>$dsnd]);
    }

    public function getXoa(Request $req){
    	return $this->delItem($req,'nd');
    }

    public function getTrangThai(Request $req){
    	return $this->editStatus($req);
    }

    public function getThem(){
    	return view('admin.nguoidung.them');
    }

    public function postThem(Request $req){
    	$this->checkPost($req);
    	return $this->addItem($req,'nd');
    }

    public function getSua($id){
    	$nd = NguoiDung::find($id);
    	return view('admin.nguoidung.sua',['nd'=>$nd]);
    }

    public function postSua(Request $req, $id){
    	return $this->editItem($req,'ndchucvu',$id);
    }

    public function getProfile(){
        $nd = Auth::guard('nguoidung')->user();
        return view('admin.nguoidung.profile',['nd'=>$nd]); 
    }

    public function postProfile(Request $req){
        $nd = Auth::guard('nguoidung')->user();
        return $this->editItem($req,'ndpro',$nd->id);
    }

    public function getMatKhau(){
        return view('admin.nguoidung.matkhau');
    }

    public function postMatKhau(Request $req){
        $nd = Auth::guard('nguoidung')->user();
        if($this->checkMatchPassword($req->oldpassword,$nd['password'])){
            $this->checkChangePassword($req);
            return $this->editItem($req,'ndpass',$nd['id']);
        }else{
            return back()->with('thongbao','Mật khẩu cũ không đúng');
        }
    }

    public function getLogin(){
        if(Auth::guard('nguoidung')->check()){
            return redirect()->route('sp');
        }
        return view('admin.nguoidung.login');
    }

    public function postLogin(Request $req){
        $this->validate($req, [
            'captcha' => 'required|captcha',
            'username' => 'required',
            'password' => 'required'
        ]);
        if(Auth::guard('nguoidung')->attempt(['username'=>$req->username,'password'=>$req->password]) && Auth::guard('nguoidung')->user()->trangthai == 1){
            $nd = Auth::guard('nguoidung')->user();
            Session::put('nd',$nd);
            return redirect('admin/sp/danhsach.html');
        }
        return back()->with('thongbao','Đăng nhập không thành công');

    }

    public function getLogout(){
        Auth::guard('nguoidung')->logout();
        Session::flush();
        return redirect('admin/login.html');
    }

    public function getTimKiem(Request $req){
        $dsnd = $this->search('nd',$req->txtSearch)->paginate(5);
        $dsnd->appends(['txtSearch' => $req->txtSearch]);
        return view('admin.nguoidung.danhsach',['dsnd'=>$dsnd]);
    }
}
