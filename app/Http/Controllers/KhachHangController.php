<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;
use App\SanPham;
use App\GioHang;
use App\DonHang;
use App\CaiDat;
use App\ChiTietDonHang;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use App\Http\Controllers\Controller;
use Igoshev\Captcha\Facades\Captcha;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Crypt;
use App\Events\SendPasswordMailEvent;
use App\Events\SendSecretMailEvent;
use Mail;

class KhachHangController extends Controller
{
    //
    public $google2fa = null;

	private function checkPost(Request $req, $id = ''){
		$this->validate($req,
    		[
    			'username' => 'required|unique:khachhang,username',
    			'password' => 'required|min:6',
    			'password_confirmation' => 'required|same:password',
    			'ten' => 'required',
    			'mail' => 'required|email|unique:khachhang,mail,'.$id,
    			'sodienthoai' => 'required',
    			'diachi' => 'required'
    		]
    	);
	}

    private function addOrder(Charge $charge, $address, $kh){
        $dh = new DonHang();
        $dh->id_stripe = $charge->id;
        $dh->tonggia = $charge->amount;
        $dh->dchigiaohang = $address;
        $dh->trangthai = 0;
        $dh->id_kh = $kh;
        $dh->save();
        return $dh;
    }

    private function addOrderDetail(DonHang $dh){
        $dssp = Session::get('cart')->dssp;
        foreach ($dssp as $sp) {
            $ctdh = new ChiTietDonHang();
            $ctdh->id_sp = $sp['sp']->id;
            $ctdh->soluong = $sp['soluong'];
            $ctdh->dongia = $sp['sp']->dongia-(($sp['sp']->dongia*$sp['sp']->khuyenmai)/100);
            $ctdh->id_dh = $dh->id;
            $ctdh->save();
            $this->updateProductQuantity($sp['sp']->id,$sp['soluong']);
        }
    }

    private function check2Fa(Request $req, $otp){
        $this->google2fa = new Google2FA();
        $secret = $req->secret;
        return $this->google2fa->verifyKey($otp, $secret);
    }

    private function sendSecretMail($username){
        $ma = rand(100000,999999);
        Session::put('ma',$ma);
        $kh = KhachHang::where('username',$username)->first();
        $data = ['ten'=>$kh['ten'],'mail'=>$kh['mail'],'ma'=>$ma];
        event(new SendSecretMailEvent($data));
    }

    public function getDanhSach(){
    	$dskh = KhachHang::paginate(5);
    	return view('admin.khachhang.danhsach',['dskh'=>$dskh]);
    }

    public function getXoa(Request $req){
    	return $this->delItem($req,'kh');
    }

    public function getLogin(){
        if(Auth::check()){
            return redirect()->route('index');
        }
        return view('login');
    }


    public function postLogin(Request $req){
        $this->validate($req,
            [
                'username' => 'required',
                'password' => 'required',
                'captcha' => 'required|captcha'
            ]
        );
        if(Auth::attempt(['username'=>$req->username,'password'=>$req->password]) && Auth::user()->loaikh == 1 ){ 
            $kh = Auth::user();
            if(Auth::user()->otp == null){
                Session::put('username',$kh->username);
                return redirect()->route('index');
            }else{
                if(Auth::user()->otp == 1){
                    $this->sendSecretMail(Auth::user()->username);
                    return view('2fa_login',['username'=>$kh->username,'type'=>'mail']);
                }else{
                    return view('2fa_login',['username'=>$kh->username,'type'=>'google']);
                }
            }
        }
        return back()->with('thongbao','Đăng nhập không thành công');
    }

    public function getLogout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('index');
    }

    public function getProfile(){
        $kh = Auth::user();
        return view('profile',['kh'=>$kh]);
    }

    public function postProfile(Request $req){
        $this->validate($req,
            [
                'ten' => 'required',
                'sodienthoai' => 'required',
                'mail' => 'required|email|unique:khachhang,mail,'.Auth::user()->id,
                'diachi' => 'required'
            ]
        );
        return $this->editItem($req,'kh',Auth::user()->id);
    }

    public function getRegister(){
        return view('register');
    }

    public function postRegister(Request $req){
    	$this->checkPost($req);
    	return $this->addItem($req,'kh');
    }

    public function getSetting(){
        return view('password');
    }

    public function postPassword(Request $req){
        $kh = Auth::user();
        if($this->checkMatchPassword($req->oldpassword,$kh['password'])){
            $this->checkChangePassword($req);
            return $this->editItem($req,'khpass',$kh['id']);
        }else{
            return back()->with('thongbao','Mật khẩu cũ không đúng');
        }
    }

    public function addCart(Request $req, $id){
        $sp = SanPham::find($id);
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $giohang = new GioHang($oldcart);
        $giohang->add($sp, $id, $req->sl);
        Session::put('cart',$giohang);
        Session::put('slsp',$giohang->soluong);
        echo $giohang->soluong;
    }

    public function removeProduct($id){
        $sp = SanPham::find($id);
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $giohang = new GioHang($oldcart);
        $dssp = Session::get('cart')->dssp;
        foreach ($dssp as $sp) {
            if($sp['sp']->id == $id){
                $soluong = $sp["soluong"];
                $thanhtien = ($sp['sp']->dongia-(($sp['sp']->dongia*$sp['sp']->khuyenmai)/100))*$sp["soluong"];
            }
        }
        $giohang->remove($id,$soluong,$thanhtien);
        Session::put('cart',$giohang);
        Session::put('slsp',$giohang->soluong);
        echo  $giohang->soluong;
    }

    public function getCart(){
        if(!Session::has('cart')){
            return back();
        }else{
            $title = CaiDat::all('ten')->first()['ten'];
            return view('cart',['title'=>$title]);
        }
    }

    public function postCheckout(Request $req){
        Stripe::setApiKey('sk_test_RtmMcqihCx3YN6NSN70n3V9o');
        $token  = $req->stripeToken;
        $charge = Charge::create(array(
            'source' => $token,
            'amount'   => Session::get('cart')->tonggia,
            'currency' => 'vnd',
        ));
        if($charge){
            if(Auth::check()){
                $address = 'Đường: '.$req->stripeBillingAddressLine1.' TP: '.$req->stripeBillingAddressCity;
            }
    
            $dh = $this->addOrder($charge,$address,Auth::user()['id']);
            if($dh){
                $this->addOrderDetail($dh);
                Session::pull('slsp');
                Session::pull('cart');
                return redirect()->route('index');
            }else{
                return back()->with('thongbao','Thêm đơn hàng không thành công');
            }
        }
        return back()->with('thongbao','Thanh toán không thành công');
    }

    public function getTimKiem(Request $req){
        $dskh = $this->search('kh',$req->txtSearch)->paginate(5);
        $dskh->appends(['txtSearch' => $req->txtSearch]);
        return view('admin.khachhang.danhsach',['dskh'=>$dskh]);
    }

    public function get2fa(Request $req){
        if($req->stt == "on"){
            $this->google2fa = new Google2FA();
            $kh = KhachHang::find(Auth::user()->id);
            $otp = $this->google2fa->generateSecretKey();
            Session::put('otp',$otp);
            $google2fa_url = $this->google2fa->getQRCodeGoogleUrl(
                $kh->ten,
                $kh->mail,
                $otp
            );
            return view('2fa_on',['google2fa_url'=>$google2fa_url]);
        }elseif($req->stt == "off"){
             return view('2fa_off');
        }else{
            return back();
        }
        
    }

    public function post2fa(Request $req){
        $this->validate($req,
            [
                'secret' => 'required|numeric'
            ]
        );
        $this->google2fa = new Google2FA();

        $secret = $req->secret;
        if($req->stt == "on"){
            $otp =  Session::pull('otp');
        }elseif($req->stt == "off"){
            $kh = Auth::user();
            $otp =  Crypt::decryptString($kh->otp);
        }else{
            return back();
        }
        $valid = $this->check2Fa($req,$otp);

        if($valid){
            $kh = Auth::user();
            if($req->stt == "on"){
                $kh->otp = Crypt::encryptString($otp);
            }elseif($req->stt == "off"){
                $kh->otp = null;
            }
            $kh->save();
            return redirect()->route('index');
        }else{
            return back()->with('thongbao','Mã sai, Hãy quét lại QRCode mới! ');
        }

    }

    public function postLogin2fa(Request $req){
        $kh = KhachHang::where('username',$req->username)->get()->first();
        if(!$req->secret) return view('2fa_login',['username'=>$kh->username]);
        if($req->type == 'google'){
            $result = $this->check2Fa($req,Crypt::decryptString($kh->otp));
        }elseif($req->type == 'mail'){
            if($req->secret == Session::pull('ma')){
                $result = TRUE;
            }
        }

        if($result){
            Session::put('username',$kh->username);
            return redirect()->route('index');
        }else{
            return view('2fa_login',['username'=>$kh->username]);
        }
    }

    public function getForget(){
        return view('forget');
    }

    public function postForget(Request $req){
        $this->validate($req,
            [
                'mail' => 'required|email'
            ]
        );

        $dskh = KhachHang::all();
        foreach ($dskh as $key => $value) {
            if($value->mail == $req->mail && $value->loaikh == 1){
                $data = ['ten'=>$value->ten,'mail'=>$value->mail,'password'=>$value->password];
                event(new SendPasswordMailEvent($data));
                return back()->with('thongbao','Vui lòng kiểm tra mail');
            }
        }
        return back()->with('thongbao','Mail không chính xác');
    }

    public function getMail(Request $req){
        if($req->stt == 'on'){
            $title = "Mở xác thực mail";
        }else{
            $title = "Tắt xác thực mail";
        }
        $this->sendSecretMail(Session::get('username'));
        return view('mail',['title'=>$title]);
    }

    public function postMail(Request $req){
        $this->validate($req,
            [
                'secret' => 'required|min:6,max:6'
            ]
        );
        $ma = $req->secret;
        $kh = KhachHang::where('username',Session::get('username'))->first();
        if($ma == Session::pull('ma')){
            if($req->stt == 'on'){
                $kh['otp'] = 1;
            }else if($req->stt == 'off'){
                $kh['otp'] = null;
            }
            $kh->save();
            return redirect()->route('index');
        }else{
            return back()->with('thongbao','Mã xác nhận sai, đã gửi lại mã mới');
        }
        //echo Session::pull('ma');
    }

}
