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
        Schema::create('giohang', function (Blueprint $table) {
            $table->id('idgh');
            $table->unsignedBigInteger('idsp');
            $table->unsignedBigInteger('idloai');
            $table->double('gia');
            $table->integer('soluong');
            $table->string('anh');
            $table->integer('tonggia');
        });
        Schema::table('giohang', function (Blueprint $table) {
            $table->foreign('idsp')->references('idsp')->on('sanpham');
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
        Schema::dropIfExists('giohang');
    }
};
