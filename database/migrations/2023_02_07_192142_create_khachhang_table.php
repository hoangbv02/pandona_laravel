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
        Schema::create('khachhang', function (Blueprint $table) {
            $table->id('idkh');
            $table->string('tenkh');
            $table->integer('sdt');
            $table->string('gioitinh');
            $table->dateTimeTz('ngaysinh');
            $table->string('diachi');
            $table->string('email');
            $table->string('matkhau');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
};
