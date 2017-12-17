<?php

use Illuminate\Database\Seeder;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $binhluan = new App\BinhLuan([
        	'noidung' => 'binhluan1',
        	'id_kh' => 31,
        	'id_sp' => 1
        ]);
        $binhluan->save();

        $binhluan = new App\BinhLuan([
        	'noidung' => 'binhluan1',
        	'id_kh' => 31,
        	'id_sp' => 2
        ]);
        $binhluan->save();

        $binhluan = new App\BinhLuan([
        	'noidung' => 'binhluan1',
        	'id_kh' => 31,
        	'id_sp' => 3
        ]);
        $binhluan->save();

        $binhluan = new App\BinhLuan([
        	'noidung' => 'binhluan1',
        	'id_kh' => 31,
        	'id_sp' => 4
        ]);
        $binhluan->save();

        $binhluan = new App\BinhLuan([
        	'noidung' => 'binhluan1',
        	'id_kh' => 32,
        	'id_sp' => 1
        ]);
        $binhluan->save();

        $binhluan = new App\BinhLuan([
        	'noidung' => 'binhluan1',
        	'id_kh' => 31,
        	'id_sp' => 1
        ]);
        $binhluan->save();

        $binhluan = new App\BinhLuan([
        	'noidung' => 'binhluan1',
        	'id_kh' => 32,
        	'id_sp' => 2
        ]);
        $binhluan->save();

        $binhluan = new App\BinhLuan([
        	'noidung' => 'binhluan1',
        	'id_kh' => 32,
        	'id_sp' => 3
        ]);
        $binhluan->save();

        $binhluan = new App\BinhLuan([
        	'noidung' => 'binhluan1',
        	'id_kh' => 33,
        	'id_sp' => 1
        ]);
        $binhluan->save();

        $binhluan = new App\BinhLuan([
        	'noidung' => 'binhluan1',
        	'id_kh' => 33,
        	'id_sp' => 1
        ]);
        $binhluan->save();
    }
}
