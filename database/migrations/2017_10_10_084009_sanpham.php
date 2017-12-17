<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('SanPham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('slug');
            $table->text('tukhoa');
            $table->text('mota');
            $table->text('noidung');
            $table->text('anhdaidien');
            $table->integer('tacgia')->unsigned()->nullable();
            $table->foreign('tacgia')->references('id')->on('NguoiDung')->onDelete('set null')->onUpdate('cascade');
            $table->double('dongia');
            $table->double('khuyenmai');
            $table->integer('soluong');
            $table->integer('id_loai')->unsigned()->nullable();
            $table->foreign('id_loai')->references('id')->on('LoaiSanPham')->onDelete('set null')->onUpdate('cascade');
            $table->integer('id_ncc')->unsigned()->nullable();
            $table->foreign('id_ncc')->references('id')->on('NhaCungCap')->onDelete('set null')->onUpdate('cascade');
            $table->integer('trangthai');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
