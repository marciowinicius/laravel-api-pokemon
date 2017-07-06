<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('name', 50);
            /* Essa coluna de tipos de pokemons foi com base no site:  http://pt-br.pokemon.wikia.com/wiki/Tipos_de_Pok%C3%A9mon*/
            $table->string('type', 30); //['planta', 'fogo', 'água', 'inseto', 'normal', 'venenoso', 'elétrico', 'terra', 'lutador', 'psíquico', 'pedra', 'voador', 'fantasma', 'gelo', 'dragão', 'metálico', 'noturno', 'fada']
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('agility');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemons');
    }
}
