<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGiangvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_giangvien', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('maso')->nullable();
            $table->string('ten')->nullable();
            $table->string('tenkhongdau')->nullable();
            $table->integer('gioitinh')->default(1);
            $table->date('ngaysinh');
            $table->string('noisinh')->nullable();
            $table->string('quequan')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('email')->nullable();
            $table->string('dienthoai')->nullable();
            $table->string('hinhanh')->nullable();
            $table->string('dantoc')->nullable();
            $table->string('nambonhiemhocvi')->nullable();
            $table->string('nuocnhanhocvi')->nullable();
            $table->string('diachilienhe')->nullable();

            $table->text('huongnghiencuu_vi')->nullable();
            $table->text('huongnghiencuu_en')->nullable();
            $table->string('tencoquan_vi')->nullable();
            $table->string('tencoquan_en')->nullable();
            $table->string('tenphongban_vi')->nullable();
            $table->string('tenphongban_en')->nullable();
            $table->string('diachicoquan_vi')->nullable();
            $table->string('diachicoquan_en')->nullable();
            $table->string('socoquan')->nullable();
            $table->string('sofaxcoquan')->nullable(); 
            $table->string('chucdanhkhoahoc_vi')->nullable();
            $table->string('chucdanhkhoahoc_en')->nullable();
            $table->string('nambonhiem')->nullable();
            $table->string('vanbang2')->nullable();
            $table->string('namtotnghiepvb2')->nullable();

            $table->string('hangchucdanhnghenghiep')->nullable();
            $table->integer('bac')->default(1);
            $table->float('hesoluong')->default(0);
            $table->integer('id_chucvu')->usigned();
            $table->integer('id_trinhdo')->usigned();
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
        Schema::dropIfExists('ht96_giangvien');
    }
}
