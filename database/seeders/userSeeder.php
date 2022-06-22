<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Yadir',
            'last_name' => 'Perdomo',
            'email' => 'yadirperdomo0509@gmail.com',
            'username' => 'yadirperdomo0509@gmail.com',
            'password' => bcrypt('7725908Ana'),
        ])->assignRole('admin');
        User::create([
            'first_name' => 'Juan',
            'last_name' => 'Sandoval',
            'email' => 'jasbsandoval@gmail.com',
            'username' => 'jasbsandoval@gmail.com',
            'password' => bcrypt('Lalola.2021'),
        ])->assignRole('user');
    }
}
