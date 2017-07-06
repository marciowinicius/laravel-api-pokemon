<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
