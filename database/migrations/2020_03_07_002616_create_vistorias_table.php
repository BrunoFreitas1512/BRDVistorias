<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vistoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comentario', 500);
            $table->date('datavistoria');
            $table->integer("salacomercial")->unsigned();
			$table->foreign("salacomercial")->references("id")->on("salacomercial");
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
        Schema::dropIfExists('vistoria');
    }
}
