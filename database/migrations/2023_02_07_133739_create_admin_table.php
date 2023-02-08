<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('admin', function (Blueprint $table) {
            $table->id('idad');
            $table->string('tenad');
            $table->integer('sdt');
            $table->string('gioitinh');
            $table->dateTimeTz('ngaysinh');
            $table->string('diachi');
            $table->string('email');
            $table->string('matkhau');
        });
        DB::table('admin')->insert([
            'tenad' => 'Hoàng',
            'sdt' => '0399206626',
            'gioitinh' => 'Nam',
            'ngaysinh' => '2002-09-28 01:02:01',
            'diachi' => 'Hà Nội',
            'email' => 'hoangk0202@gmail.com',
            'matkhau' => md5('123456')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
};
