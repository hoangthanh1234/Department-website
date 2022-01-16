<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuatrinhdaotao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ht96_quatrinhdaotao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('tencoso_vi')->nullable();
            $table->string('tencoso_en')->nullable();
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->string('chuyennganh_vi')->nullable();
            $table->string('chuyennganh_en')->nullable();           
            $table->string('minhchung')->nullable();
            $table->string('noidaotao_vi')->nullable();
            $table->string('noidaotao_en')->nullable();
            $table->string('tenluanan')->nullable();
            $table->integer('id_bacdaotao')->usigned();
            $table->integer('id_hedaotao')->usigned(); 
            $table->integer('id_trinhdo')->usigned();         
            $table->integer('id_giangvien')->usigned();
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
        Schema::dropIfExists('ht96_quatrinhdaotao');
    }
}
