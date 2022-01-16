<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChuongtrinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_chuongtrinh', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('hienthi')->default(1);            
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();
            $table->string('tenkhongdau_vi')->nullable();
            $table->string('tenkhongdau_en')->nullable();
            $table->text('mota_vi')->nullable();
            $table->text('mota_en')->nullable();
            $table->text('kynang_vi')->nullable();
            $table->text('kynang_en')->nullable();
            $table->text('cohoi_vi')->nullable();
            $table->text('cohoi_en')->nullable();
            $table->string('hinhanh')->nullable();
            $table->integer('id_hedaotao')->usigned();
            $table->integer('id_bacdaotao')->usigned();
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
        Schema::dropIfExists('ht96_chuongtrinh');
    }
}
