<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInfor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_infor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();
            $table->string('diachi_vi')->nullable();
            $table->string('diachi_en')->nullable();
            $table->string('email')->nullable();
            $table->string('dienthoai')->nullable();
            $table->string('toado')->nullable();
            $table->string('website')->nullable();            
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
        Schema::dropIfExists('ht96_infor');
    }
}
