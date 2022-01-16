<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhieuKhac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_phieu_khac', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_phieu')->usigned();
            $table->integer('id_tieuchi')->usigned();
            $table->float('soluong')->default(0);
            $table->float('diemdat')->default(0);
            $table->string('minhchung')->nullable();
            $table->float('soluongkhoa')->default(0);
            $table->float('diemdatkhoa')->default(0);
            $table->float('soluongbomon')->default(0);
            $table->float('diemdatbomon')->default(0);
            $table->text('gopykhoa')->nullable();
            $table->text('gopybomon')->nullable();
            $table->text('phanhoikhoa')->nullable();
            $table->text('phanhoibomon')->nullable();
            $table->integer('giangvienduyet')->default(0);
            $table->integer('bomonduyet')->default(0);
            $table->integer('khoaduyet')->default(0);
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
        Schema::dropIfExists('ht96_phieu_khac');
    }
}
