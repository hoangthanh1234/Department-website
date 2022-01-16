<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetainghiencuu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_detainghiencuu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('noibat')->default(0);
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();   
            $table->integer('sotacgia')->default(0);   
            $table->integer('tacgia')->default(0);        
            $table->string('maso')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('minhchung')->nullable();
            $table->date('ngaybatdau');
            $table->date('ngaynghiemthu');
            $table->integer('id_capdetai')->usigned();                     
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
        Schema::dropIfExists('ht96_detainghiencuu');
    }
}
