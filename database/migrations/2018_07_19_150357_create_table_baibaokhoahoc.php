<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBaibaokhoahoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_baibaokhoahoc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('noibat')->default(0);
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();            
            $table->text('nxb')->nullable();
            $table->string('so_issn')->nullable();
            $table->date('nam')->nullable();
            $table->string('minhchung')->nullable();
            $table->text('ghichu')->nullable();   
            $table->integer('sotacgia')->default(0);
            $table->integer('tacgia')->nullable();
            $table->integer('id_loaibaibao')->usigned(); 
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
        Schema::dropIfExists('ht96_baibaokhoahoc');
    }
}
