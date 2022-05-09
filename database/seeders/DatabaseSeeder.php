<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();
       
        \DB::table('users')->insert([
            [
               
                'name' => 'Konsultasi',
                'email' => 'yudi@gmail.com',
                'role' => 2,
                'password' => Hash::make('password'),
            ],
        ]);

    }
}
