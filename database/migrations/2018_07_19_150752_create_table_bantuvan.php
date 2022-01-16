<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBantuvan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_bantuvan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('ten')->nullable();
            $table->string('dienthoai')->nullable();
            $table->string('email')->nullable();
            
            $table->string('donvicongtac')->nullable();
            $table->string('diachilienhe')->nullable();
            $table->integer('id_bomon')->usigned();
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
        Schema::dropIfExists('ht96_bantuvan');
    }
}
