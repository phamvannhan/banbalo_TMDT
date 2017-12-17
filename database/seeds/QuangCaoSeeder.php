<?php

use Illuminate\Database\Seeder;

class QuangCaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$quangcao = new App\QuangCao([
    		'hinh' => 'C:\xampp\htdocs\mywebsite\public\upload',
    		'href' => 'http://zing.vn',
    		'mota' => 'zing.vn',
    		'id_kh' => 31,
    		'id_qc' => 1
    	]);
    	$quangcao->save();

    	$quangcao = new App\QuangCao([
    		'hinh' => 'C:\xampp\htdocs\mywebsite\public\upload',
    		'href' => 'http://zing.vn',
    		'mota' => 'zing.vn',
    		'id_kh' => 32,
    		'id_qc' => 2
    	]);
    	$quangcao->save();

    	$quangcao = new App\QuangCao([
    		'hinh' => 'C:\xampp\htdocs\mywebsite\public\upload',
    		'href' => 'http://zing.vn',
    		'mota' => 'zing.vn',
    		'id_kh' => 33,
    		'id_qc' => 3
    	]);
    	$quangcao->save();
    }
}
