<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTieuchiNckhBaibao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_tieuchi_nckh_baibao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('hienthi')->default(1);
            $table->text('ten')->nullable();
            $table->float('diem');
            $table->string('donvitinh')->nullable(); 
            $table->string('loaiminhchung')->nullable();
            $table->integer('id_loaibaibao')->usigned();
            $table->integer('id_loaitacgia')->usigned();
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
        Schema::dropIfExists('ht96_tieuchi_nckh_baibao');
    }
}
