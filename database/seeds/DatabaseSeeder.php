<?php

use Illuminate\Database\Seeder;
use database\seeds;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(ChuyenMucSeeder::class);
        $this->call(LoaiSanPhamSeeder::class);
        $this->call(NhaCungCapSeeder::class);
        $this->call(SlideSeeder::class);
        $this->call(CaiDatSeeder::class);
        $this->call(NguoiDungSeeder::class);
        $this->call(KhachHangSeeder::class);
        $this->call(QuanLiQuangCaoSeeder::class);
        $this->call(QuangCaoSeeder::class);
        $this->call(SanPhamSeeder::class);
        $this->call(PhieuNhapSeeder::class);
        $this->call(ChiTietPhieuNhapSeeder::class);
        $this->call(BinhLuanSeeder::class);
        $this->call(DonHangSeeder::class);
        $this->call(ChiTietDonHangSeeder::class);
              
    }
}
