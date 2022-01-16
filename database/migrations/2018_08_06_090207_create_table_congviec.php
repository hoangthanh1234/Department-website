<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCongviec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_congviec', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten')->nullable();
            $table->text('noidung')->nullable();            
            $table->integer('trangthai')->default(0);
            $table->integer('id_nhomcongviec')->usigned();
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
        Schema::dropIfExists('ht96_congviec');
    }
}
