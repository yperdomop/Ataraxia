<?php

namespace Database\Seeders;

use App\Models\Company_datum;
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
        Company_datum::create([
            'bussiness_name' => 'el 7',
            'language' => 'es',
            'legal_representative' => 'Martha Perez',
            'legal_representative_document' => '123456789',
            'nit' => '123456789-0',
            'address' => 'Call 58 sur 97B-66',
            'phone' => '6017147546',
            'city_id' => 1,
            'email' => 'martha1@gmail.com',
            'provider_type_id' => 1,
        ]);
        Company_datum::create([
            'bussiness_name' => 'mice',
            'language' => 'es',
            'legal_representative' => 'Juan Sandoval',
            'legal_representative_document' => '1022353668',
            'nit' => '1022353668-0',
            'address' => 'Call 58 sur 97B-66',
            'phone' => '6017147546',
            'city_id' => 1,
            'email' => 'jasbsandoval@gmail.com',
            'sport_id' => 1,
        ]);

        User::create([
            'first_name' => 'Yadir',
            'last_name' => 'Perdomo',
            'email' => 'yadirperdomo0509@gmail.com',
            'username' => 'yadirperdomo0509@gmail.com',
            'password' => bcrypt('7725908Ana'),
            'status' => 'activo'
        ])->assignRole('admin');

        User::create([
            'first_name' => 'Juan',
            'last_name' => 'Sandoval',
            'email' => 'jasbsandoval@gmail.com',
            'username' => 'jasbsandoval@gmail.com',
            'company_datum_id' => 2,
            'password' => bcrypt('Lalola.2021'),
            'status' => 'activo'
        ])->assignRole('user');

        User::create([
            'first_name' => 'Martha',
            'last_name' => 'Perez',
            'email' => 'martha1@gmail.com',
            'username' => 'martha1@gmail.com',
            'company_datum_id' => 1,
            'password' => bcrypt('123456789'),
            'status' => 'activo'
        ])->assignRole('proveedor');
    }
}
