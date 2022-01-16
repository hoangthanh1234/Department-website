<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCtXettuyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_ct_xettuyen', function (Blueprint $table) {            
            $table->integer('id_chuongtrinh')->usigned();
            $table->integer('id_tohop')->usigned();
            $table->float('diem')->default(1);
            $table->primary(['id_chuongtrinh','id_tohop']);
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
        Schema::dropIfExists('ht96_ct_xettuyen');
    }
}
