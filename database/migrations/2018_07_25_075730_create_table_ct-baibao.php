<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCtBaibao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_ct_baibao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_giangvien')->usigned();
            $table->integer('id_loaitacgia')->usigned();
            $table->integer('id_baibao')->usigned();
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
        Schema::dropIfExists('ht96_ct_baibao');
    }
}
