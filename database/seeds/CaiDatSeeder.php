<?php

use Illuminate\Database\Seeder;

class CaiDatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$caidat = new App\CaiDat([
    		'ten' => 'ShopBalo',
    		'mota' => "ShopBalo hệ thống thông tin nhóm 8",
    		'keywords' => 'balo, shop, nhom8, shopbalo',
    		'trangthai' => 1,
    		'diachi' => 'minishop cmt8 quan 10',
    		'sdt1' => '0909515240',
    		'sdt2' => '113',
    		'sdt3' => '911'
    	]);
    	$caidat->save();
    }
}
