<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhieuNckhDetai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_phieu_nckh_detai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_phieu')->usigned();
            $table->integer('id_tieuchi')->usigned();
            $table->integer('id_chitietdetai')->usigned();
            $table->string('minhchung')->nullable();
            $table->integer('giangvienduyet')->default(0);           
            $table->integer('bomonduyet')->defaut(0); 
            $table->integer('khoaduyet')->defaut(0);                
            $table->text('gopykhoa')->nullable();
            $table->text('gopybomon')->nullable();
            $table->text('phanhoikhoa')->nullable();
            $table->text('phanhoibomon')->nullable();
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
        Schema::dropIfExists('ht96_phieu_nckh_detai');
    }
}
