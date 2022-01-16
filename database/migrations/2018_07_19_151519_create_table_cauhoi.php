<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCauhoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_cauhoi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('noibat')->dafault(0);
            $table->string('ten')->nullable();
            $table->string('email')->nullable();
            $table->text('noidung')->nullable();            
            $table->text('traloi')->nullable();
            $table->integer('nguoitraloi')->nullable();
            $table->integer('view')->default(0);
            $table->integer('id_chude')->usigned();
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
        Schema::dropIfExists('ht96_cauhoi');
    }
}
