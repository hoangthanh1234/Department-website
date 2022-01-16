<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_lop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('malop')->nullable();
            $table->string('tenlop')->nullable();
            $table->string('khoahoc')->nullable();
            $table->string('namtotnghiep')->nullable();
            $table->string('email')->nullable();
            $table->integer('id_bomon')->usigned();
            $table->integer('id_bacdaotao')->usigned();                   
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
        Schema::dropIfExists('ht96_lop');
    }
}
