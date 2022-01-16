<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCtDanhgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_ct_danhgia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soluong')->nullable();
            $table->integer('diemdat')->nullable();
            $table->integer('soluongkhoa')->nullable();
            $table->integer('diemdatkhoa')->nullable();
            $table->string('minhchung')->nullable();           
            $table->integer('giangvienduyet')->default(0);
            $table->integer('bomonduyet')->default(0);
            $table->integer('khoaduyet')->default(0);
            $table->string('bomongopy')->nullable();
            $table->string('khoagopy')->nullable();
            $table->string('phanhoibomon')->nullable();
            $table->string('phanhoikhoa')->nullable();  
            $table->integer('id_phieudanhgia')->usigned();
            $table->integer('id_tieuchi')->usigned();          
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
        Schema::dropIfExists('ht96_ct_danhgia');
    }
}
