<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHuongdansaudaihoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_huongdansaudaihoc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('tensinhvien_vi')->nullable();
            $table->string('tensinhvien_en')->nullable();
            $table->string('tendetai_vi')->nullable();
            $table->string('tendetai_en')->nullable();
            $table->string('tencoso_vi')->nullable();
            $table->string('tencoso_en')->nullable();
            $table->date('namhuongdan')->nullable();
            $table->date('nambaove')->nullable();
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
        Schema::dropIfExists('ht96_huongdansaudaihoc');
    }
}
