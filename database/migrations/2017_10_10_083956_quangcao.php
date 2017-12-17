<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Quangcao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('QuangCao', function (Blueprint $table) {
            $table->increments('id');
            $table->text('hinh');
            $table->text('href');
            $table->text('mota');
            $table->integer('id_kh')->unsigned()->nullable();
            $table->foreign('id_kh')->references('id')->on('KhachHang')->onDelete('set null')->onUpdate('cascade');
            $table->integer('id_qc')->unsigned()->nullable();
            $table->foreign('id_qc')->references('id')->on('QuanLiQuangCao')->onDelete('set null')->onUpdate('cascade');
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
