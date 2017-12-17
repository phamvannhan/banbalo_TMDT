<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Donhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('DonHang', function (Blueprint $table) {
            $table->increments('id');
            $table->double('tonggia');
            $table->text('dchigiaohang');
            $table->date('ngaygiaohang');
            $table->integer('trangthai');
            $table->integer('id_kh')->unsigned()->nullable();
            $table->foreign('id_kh')->references('id')->on('KhachHang')->onDelete('set null')->onUpdate('cascade');
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
