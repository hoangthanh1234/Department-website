<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCtPhancongviec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_ct_phancongviec', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('ten');
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->date('ngayhoanthanh');
            $table->integer('trangthai')->default(0);
            $table->string('ghichu')->nullable();
            $table->string('ghichubaocao')->nullable();
            $table->string('minhchung')->nullable();
            $table->string('color')->default('#f39c12');
            $table->integer('id_giangvien');
            $table->integer('id_phancong');
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
        Schema::dropIfExists('ht96_ct_phancongviec');
    }
}
