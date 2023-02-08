<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id('idsp');
            $table->unsignedBigInteger('idloai');
            $table->string('tensp');
            $table->integer('soluong');
            $table->double('gia');
            $table->string('anh');
            $table->string('mota');
            $table->timestamps();
        });
        Schema::table('sanpham', function (Blueprint $table) {
            $table->foreign('idloai')->references('idloai')->on('loaisp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
};
