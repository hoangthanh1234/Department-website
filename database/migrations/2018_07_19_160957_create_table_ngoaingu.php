<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNgoaingu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_ngoaingu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();
            $table->string('thongthao_vi')->nullable();
            $table->string('thongthao_en')->nullable();
            $table->integer('id_giangvien')->usigned();
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
        Schema::dropIfExists('ht96_ngoaingu');
    }
}
