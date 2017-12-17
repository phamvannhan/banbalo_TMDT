<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Loaisanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('LoaiSanPham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('slug');
            $table->integer('vitri');
            $table->integer('id_cm')->unsigned()->nullable();
            $table->foreign('id_cm')->references('id')->on('ChuyenMuc')->onDelete('set null')->onUpdate('cascade');
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
