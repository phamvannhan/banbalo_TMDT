<?php

use Illuminate\Database\Seeder;

class QuanLiQuangCaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $quanliquangcao = new App\QuanLiQuangCao([
        	'gia' => '20000000',
        	'vitri' => 1,
        	'thoigian' => '30'
        ]);
        $quanliquangcao->save();

         $quanliquangcao = new App\QuanLiQuangCao([
        	'gia' => '15000000',
        	'vitri' => 2,
        	'thoigian' => '30'
        ]);
        $quanliquangcao->save();

         $quanliquangcao = new App\QuanLiQuangCao([
        	'gia' => '10000000',
        	'vitri' => 3,
        	'thoigian' => '30'
        ]);
        $quanliquangcao->save();
    }
}
