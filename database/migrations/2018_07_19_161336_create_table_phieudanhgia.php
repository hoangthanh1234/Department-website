<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhieudanhgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_phieudanhgia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maphieu')->nullable();  
            $table->float('diemgiangday')->default(0);
            $table->float('diemnckh')->default(0);
            $table->float('diemkhac')->default(0);
            $table->float('diemgiangdaybomon')->default(0);
            $table->float('diemnckhbomon')->default(0);
            $table->float('diemkhacbomon')->default(0);
            $table->float('diemgiangdaykhoa')->default(0);
            $table->float('diemnckhkhoa')->default(0);
            $table->float('diemkhackhoa')->default(0);         
            $table->integer('trangthai')->default(0);
            $table->string('xeploai')->nullable();
            $table->integer('id_giangvien')->usigned();
            $table->integer('id_thongbao')->usigned();
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
        Schema::dropIfExists('ht96_phieudanhgia');
    }
}
