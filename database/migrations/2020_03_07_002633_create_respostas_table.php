<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resposta', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('situacao');
            $table->integer("vistoria")->unsigned();
            $table->integer("pergunta")->unsigned();
            $table->foreign("vistoria")->references("id")->on("vistoria");
			$table->foreign("pergunta")->references("id")->on("pergunta");
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
        Schema::dropIfExists('resposta');
    }
}
