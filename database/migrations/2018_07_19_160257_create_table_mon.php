<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ht96_mon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stt')->default(1);
            $table->integer('hienthi')->default(1); 
            $table->string('mamon')->nullable();          
            $table->string('ten_vi')->nullable();
            $table->string('ten_en')->nullable();
            $table->text('mota_vi')->nullable();
            $table->text('mota_en')->nullable();
            $table->integer('stc')->default(0);
            $table->integer('lt')->default(0);
            $table->integer('th')->default(0);
            $table->string('songhanh')->nullable();
            $table->string('tienquyet')->nullable();
            $table->integer('tuchon')->default(0);
            $table->integer('id_bacdaotao')->usigned();
            $table->integer('id_bomon')->usigned();
            $table->integer('id_chuyennganh')->usigned();
            $table->integer('id_nhommon')->usigned();
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
        Schema::dropIfExists('ht96_mon');
    }
}
