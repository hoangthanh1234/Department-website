<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCuusinhvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_cuusinhvien', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('noibat')->default(0);           
            $table->string('noicongtac_vi')->nullable();
            $table->string('noicongtac_en')->nullable();
            $table->string('chucvu_vi')->nullable();
            $table->string('chucvu_en')->nullable();
            $table->string('socoquan')->nullable();
            $table->text('diachicoquan')->nullable();
            $table->text('hinhanh')->nullable(); 
            $table->integer('update')->default(0);
            $table->integer('id_sinhvien')->usigned();  
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
        Schema::dropIfExists('ht96_cuusinhvien');
    }
}
