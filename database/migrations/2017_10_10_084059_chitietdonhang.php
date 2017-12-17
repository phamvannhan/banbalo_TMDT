<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chitietdonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ChiTietDonHang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sp')->unsigned()->nullable();
            $table->foreign('id_sp')->references('id')->on('SanPham')->onDelete('set null')->onUpdate('cascade');
            $table->integer('soluong');
            $table->double('dongia');
            $table->integer('id_dh')->unsigned()->nullable();
            $table->foreign('id_dh')->references('id')->on('DonHang')->onDelete('set null')->onUpdate('cascade');
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
