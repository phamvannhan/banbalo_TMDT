<?php

use Illuminate\Database\Seeder;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $loaisanpham = new App\LoaiSanPham([
        	'ten' => 'loai1',
            'slug' => 'loai1',
            'vitri' => 1,
            'id_cm' => 1,
        ]);
        $loaisanpham->save();


        $loaisanpham = new App\LoaiSanPham([
            'ten' => 'loai1',
            'slug' => 'loai1',
            'vitri' => 2,
            'id_cm' => 2,
        ]);
        $loaisanpham->save();


        $loaisanpham = new App\LoaiSanPham([
            'ten' => 'loai1',
            'slug' => 'loai1',
            'vitri' => 3,
            'id_cm' => 3,
        ]);
        $loaisanpham->save();


        $loaisanpham = new App\LoaiSanPham([
            'ten' => 'loai1',
            'slug' => 'loai1',
            'vitri' => 4,
            'id_cm' => 4,
        ]);
        $loaisanpham->save();


        $loaisanpham = new App\LoaiSanPham([
            'ten' => 'loai1',
            'slug' => 'loai1',
            'vitri' => 5,
            'id_cm' => 5,
        ]);
        $loaisanpham->save();
    }
}
