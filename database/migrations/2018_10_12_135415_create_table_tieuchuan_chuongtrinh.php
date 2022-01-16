<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTieuchuanChuongtrinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_tieuchuan_chuongtrinh', function (Blueprint $table){           
            $table->integer('id_chuongtrinh');
            $table->integer('id_hocky');
            $table->integer('TCBB');
            $table->integer('LTBB');
            $table->integer('THBB');
            $table->integer('TCTC');
            $table->integer('LTTC');
            $table->integer('THTC');
            $table->primary(['id_chuongtrinh','id_hocky']);
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
        Schema::dropIfExists('ht96_tieuchuan_chuongtrinh');
    }
}
