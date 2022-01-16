<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhancongviec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_phancongviec', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_congviec');
            $table->integer('id_giangvien');
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->date('ngayhoanthanh');
            $table->integer('trangthai')->default(0);
            $table->string('ghichu')->nullable();
            $table->string('ghichubaocao')->nullable();
            $table->string('minhchung')->nullable();
            $table->string('color')->default('#f39c12');
            $table->integer('taskmaster');
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
        Schema::dropIfExists('ht96_phancongviec');
    }
}
