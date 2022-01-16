<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLoaitacgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_loaitacgia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);  
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();
            $table->integer('phantram')->default(0);
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
        Schema::dropIfExists('ht96_loaitacgia');
    }
}
