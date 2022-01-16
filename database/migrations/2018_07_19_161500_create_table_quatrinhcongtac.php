<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuatrinhcongtac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ht96_quatrinhcongtac', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->string('tencoso_vi')->nullable();
            $table->string('tencoso_en')->nullable();
            $table->text('diachicoso_vi')->nullable();
            $table->text('diachicoso_en')->nullable();
            $table->string('sdtcoso')->nullable();
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');                     
            $table->text('ghichu')->nullable();
            $table->string('id_chucvu')->usigned();
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
        Schema::dropIfExists('ht96_quatrinhcongtac');
    }
}
