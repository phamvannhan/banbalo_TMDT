<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chitietphieunhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ChiTietPhieuNhap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sp')->unsigned()->nullable();
            $table->foreign('id_sp')->references('id')->on('SanPham')->onDelete('set null')->onUpdate('cascade');
            $table->integer('soluong');
            $table->double('gianhap');
            $table->integer('id_pn')->unsigned()->nullable();
            $table->foreign('id_pn')->references('id')->on('PhieuNhap')->onDelete('set null')->onUpdate('cascade');
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
