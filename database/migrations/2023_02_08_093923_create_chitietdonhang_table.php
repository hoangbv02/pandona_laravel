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
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->id('idctdh');
            $table->unsignedBigInteger('idsp');
            $table->integer('dhcode');
            $table->double('gia');
            $table->integer('soluong');
            $table->double('tongtien');
        });
        Schema::table('chitietdonhang', function (Blueprint $table) {
            $table->foreign('idsp')->references('idsp')->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdonhang');
    }
};
