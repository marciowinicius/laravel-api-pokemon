<?php

use Illuminate\Database\Seeder;
use App\Pokemon;

class PokemonSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pokemon::create([
            'user_id' => 1,
            'name' => 'Pikachu',
            'type' => 'elétrico',
            'attack' => 76,
            'defense' => 31,
            'agility' => 82,
        ]);

        Pokemon::create([
            'user_id' => 1,
            'name' => 'Charizard',
            'type' => 'fogo',
            'attack' => 83,
            'defense' => 62,
            'agility' => 38,
        ]);
    }
}
