<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Phieunhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('PhieuNhap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ncc')->unsigned()->nullable();
            $table->foreign('id_ncc')->references('id')->on('NhaCungCap')->onDelete('set null')->onUpdate('cascade');
            $table->double('tonggia');
            $table->date('ngaydat');
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
