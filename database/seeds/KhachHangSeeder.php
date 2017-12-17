<?php

use Illuminate\Database\Seeder;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$khachhang = new App\KhachHang([
    		'username' => 'KhachhHang1',
    		'password' => 'password1',
    		'ten' => 'ten1',
    		'diachi' => 'diachi1',
    		'sodienthoai' => 'sodienthoai1',
    		'mail' => 'tanthanh@gmail.com'
    	]);
    	$khachhang->save();

    	$khachhang = new App\KhachHang([
    		'username' => 'KhachhHang2',
    		'password' => 'password2',
    		'ten' => 'ten2',
    		'diachi' => 'diachi2',
    		'sodienthoai' => 'sodienthoai2',
    		'mail' => 'tanthanh@gmail.com'
    	]);
    	$khachhang->save();


    	$khachhang = new App\KhachHang([
    		'username' => 'KhachhHang3',
    		'password' => 'password3',
    		'ten' => 'ten3',
    		'diachi' => 'diachi3',
    		'sodienthoai' => 'sodienthoai3',
    		'mail' => 'tanthanh@gmail.com'
    	]);
    	$khachhang->save();

    	$khachhang = new App\KhachHang([
    		'username' => 'KhachhHang4',
    		'password' => 'password4',
    		'ten' => 'ten4',
    		'diachi' => 'diachi4',
    		'sodienthoai' => 'sodienthoai4',
    		'mail' => 'tanthanh@gmail.com'
    	]);
    	$khachhang->save();

    	$khachhang = new App\KhachHang([
    		'username' => 'KhachhHang5',
    		'password' => 'password5',
    		'ten' => 'ten5',
    		'diachi' => 'diachi5',
    		'sodienthoai' => 'sodienthoai5',
    		'mail' => 'tanthanh@gmail.com'
    	]);
    	$khachhang->save();

    	$khachhang = new App\KhachHang([
    		'username' => 'KhachhHang6',
    		'password' => 'password6',
    		'ten' => 'ten6',
    		'diachi' => 'diachi6',
    		'sodienthoai' => 'sodienthoai6',
    		'mail' => 'tanthanh@gmail.com'
    	]);
    	$khachhang->save();

    	$khachhang = new App\KhachHang([
    		'username' => 'KhachhHang7',
    		'password' => 'password7',
    		'ten' => 'ten7',
    		'diachi' => 'diachi7',
    		'sodienthoai' => 'sodienthoai7',
    		'mail' => 'tanthanh@gmail.com'
    	]);
    	$khachhang->save();

    	$khachhang = new App\KhachHang([
    		'username' => 'KhachhHang8',
    		'password' => 'password8',
    		'ten' => 'ten8',
    		'diachi' => 'diachi8',
    		'sodienthoai' => 'sodienthoai8',
    		'mail' => 'tanthanh@gmail.com'
    	]);
    	$khachhang->save();

    	$khachhang = new App\KhachHang([
    		'username' => 'KhachhHang9',
    		'password' => 'password9',
    		'ten' => 'ten9',
    		'diachi' => 'diachi9',
    		'sodienthoai' => 'sodienthoai9',
    		'mail' => 'tanthanh@gmail.com'
    	]);
    	$khachhang->save();

    	$khachhang = new App\KhachHang([
    		'username' => 'KhachhHang10',
    		'password' => 'password10',
    		'ten' => 'ten10',
    		'diachi' => 'diachi10',
    		'sodienthoai' => 'sodienthoai10',
    		'mail' => 'tanthanh@gmail.com'
    	]);
    	$khachhang->save();

    }
}
