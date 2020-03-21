<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaComercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salacomercial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 200);
            $table->string('nomeproprietario', 100);
            $table->integer("endereco")->unsigned();
			$table->foreign("endereco")->references("id")->on("endereco");
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
        Schema::dropIfExists('salacomercial');
    }
}
