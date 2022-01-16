<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMongiangday extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('ht96_mongiangday', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();
            $table->string('nambatdau')->nullable();
            $table->string('doituong_vi')->nullable();
            $table->string('doituong_en')->nullable();
            $table->string('noiday_vi')->nullable();
            $table->string('noiday_en')->nullable();
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
        Schema::dropIfExists('ht96_mongiangday');
    }
}
