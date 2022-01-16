<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTohop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ht96_tohop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('hienthi')->default(1);           
            $table->string('ten')->nullable();
            $table->string('monxt')->nullable();
            $table->string('khoi')->nullable();
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
        Schema::dropIfExists('ht96_tohop');
    }
}
