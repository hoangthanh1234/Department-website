<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCtDaotao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ht96_ct_daotao', function (Blueprint $table) {
            $table->integer('id_chuongtrinh')->usigned();
            $table->integer('id_mon')->usigned();
            $table->integer('id_hocky')->usigned();
            $table->integer('thinhgiang')->default(0);
            $table->primary(['id_chuongtrinh','id_mon']);
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
        Schema::dropIfExists('ht96_ct_daotao');
    }
}
