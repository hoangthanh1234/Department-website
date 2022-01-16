<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_about', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('hienthi')->default(1);
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();
            $table->string('tenkhongdau_vi');
            $table->string('tenkhongdau_en');
            $table->text('mota_vi')->nullable();
            $table->text('mota_en')->nullable();
            $table->text('noidung_vi')->nullable();
            $table->text('noidung_en')->nullable();
            $table->string('title_vi')->nullable();
            $table->string('title_en')->nullable();
            $table->string('description_vi')->nullable();
            $table->string('description_en')->nullable();
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
        Schema::dropIfExists('ht96_about');
    }
}
