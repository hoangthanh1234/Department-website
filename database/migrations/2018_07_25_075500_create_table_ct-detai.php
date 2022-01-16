<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCtDetai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_ct_detai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_detai')->usigned();
            $table->integer('id_giangvien')->usigned();            
            $table->integer('id_trachnhiemdetai')->usigned();
            $table->float('thangthuchien')->default(0);
            $table->integer('chon')->default(0);
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
        Schema::dropIfExists('ht96_ct_detai');
    }
}
