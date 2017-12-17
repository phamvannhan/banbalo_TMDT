<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Binhluan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('BinhLuan', function (Blueprint $table) {
            $table->increments('id');
            $table->text('noidung');
            $table->integer('id_kh')->unsigned()->nullable();
            $table->foreign('id_kh')->references('id')->on('KhachHang')->onDelete('set null')->onUpdate('cascade');
            $table->integer('id_nd')->unsigned()->nullable();
            $table->foreign('id_nd')->references('id')->on('NguoiDung')->onDelete('set null')->onUpdate('cascade');
            $table->integer('id_sp')->unsigned()->nullable();
            $table->foreign('id_sp')->references('id')->on('SanPham')->onDelete('set null')->onUpdate('cascade');
            $table->integer('id_parent')->default(null);
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
