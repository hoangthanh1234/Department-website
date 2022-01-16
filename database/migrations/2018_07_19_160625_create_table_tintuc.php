<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ht96_tintuc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('hienthi')->default(1);
            $table->integer('noibat')->default(1);
            $table->integer('luotxem')->default(1);
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();
            $table->string('tenkhongdau_vi')->nullable();
            $table->string('tenkhongdau_en')->nullable();
            $table->text('mota_vi')->nullable();
            $table->text('mota_en')->nullable();
            $table->text('noidung_vi')->nullable();
            $table->text('noidung_en')->nullable();
            $table->string('hinhanh')->nullable();           
            $table->string('title_vi')->nullable();
            $table->string('title_en')->nullable();
            $table->string('description_vi')->nullable();
            $table->string('description_en')->nullable();
            $table->integer('tintuc')->default(1);
            $table->string('id_danhmuc')->usigned();
            $table->string('id_bomon')->usigned();                                  
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
        Schema::dropIfExists('ht96_tintuc');
    }
}
