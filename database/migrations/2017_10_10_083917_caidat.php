<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Caidat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('CaiDat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->text('mota');
            $table->text('keywords');
            $table->integer('trangthai');
            $table->text('diachi');
            $table->string('sdt1');
            $table->string('sdt2');
            $table->string('sdt3');
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
