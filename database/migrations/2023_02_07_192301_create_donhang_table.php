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
        Schema::create('donhang', function (Blueprint $table) {
            $table->id('iddh');
            $table->unsignedBigInteger('idkh');
            $table->integer('dhcode');
            $table->integer('sdt');
            $table->string('diachi');
            $table->dateTimeTz('ngaydathang');
            $table->integer('trangthai');
            $table->double('tongtien');
        });
        Schema::table('donhang', function (Blueprint $table) {
            $table->foreign('idkh')->references('idkh')->on('khachhang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
};
