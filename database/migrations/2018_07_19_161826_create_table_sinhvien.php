<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSinhvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_sinhvien', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('totnghiep')->default(0);
            $table->string('masinhvien')->nullable();          
            $table->string('tensinhvien')->nullable();
            $table->integer('gioitinh')->default(1);
            $table->date('ngaysinh');
            $table->string('noisinh')->nullable();
            $table->string('diachi')->nullable();
            $table->string('email')->nullable();
            $table->string('dienthoai')->nullable();
            $table->integer('id_lop')->usigned();            
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
        Schema::dropIfExists('ht96_sinhvien');
    }
}
