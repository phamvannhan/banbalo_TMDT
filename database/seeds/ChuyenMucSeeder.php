<?php

use Illuminate\Database\Seeder;

class ChuyenMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $chuyenmuc = new App\ChuyenMuc([
        	'ten' => 'Menu1',
        	'vitri' => 1
        ]);
        $chuyenmuc->save();

        $chuyenmuc = new App\ChuyenMuc([
        	'ten' => 'Menu2',
        	'vitri' => 2
        ]);
        $chuyenmuc->save();

        $chuyenmuc = new App\ChuyenMuc([
        	'ten' => 'Menu3',
        	'vitri' => 3
        ]);
        $chuyenmuc->save();

        $chuyenmuc = new App\ChuyenMuc([
        	'ten' => 'Menu4',
        	'vitri' => 4
        ]);
        $chuyenmuc->save();

        $chuyenmuc = new App\ChuyenMuc([
        	'ten' => 'Menu5',
        	'vitri' => 5
        ]);
        $chuyenmuc->save();
    }
}
