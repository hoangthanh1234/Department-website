<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableThongbaodanhgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_thongbaodanhgia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('hienthi')->default(1);
            $table->integer('trangthai')->default(1);
            $table->text('ten')->nullable();
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->date('tungay');
            $table->date('denngay');
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
        Schema::dropIfExists('ht96_thongbaodanhgia');
    }
}
