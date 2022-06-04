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
            'name' => 'yadir perdomo',
            'email' => 'yadirperdomo0509@gmail.com',
            'password' => bcrypt('7725908Ana'),
        ])->assignRole('admin');
        User::create([
            'name' => 'Juan Sandoval',
            'email' => 'jasbsandoval@gmail.com',
            'password' => bcrypt('Lalola.2021'),
        ])->assignRole('user');
    }
}
