<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKhoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_khoa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default();
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();
            $table->string('tenkhongdau_vi')->nullable();
            $table->string('tenkhongdau_en')->nullable();
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
        Schema::dropIfExists('ht96_khoa');
    }
}
