<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChedogiochuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht96_chedogiochuan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_chucvu');
            $table->float('tylephantramgiochuan')->default(0) ;
            $table->float('sogiomiengiam')->default(0);
            $table->float('sogiothuchien')->default(0);
            $table->float('giochuan')->default(0);
            $table->string('ghichu')->nullable();
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
        Schema::dropIfExists('ht96_chedogiochuan');
    }
}
