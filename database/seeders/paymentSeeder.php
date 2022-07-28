<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment_frequency;
use App\Models\City;
use App\Models\Sport;
use App\Models\Membership_price;
use Spatie\Permission\Models\Role;
use App\Models\Provider_types;

class paymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment_frequency::create([
            'name' => 'Trimestral',
            'registred' => null
        ]);
        Payment_frequency::create([
            'name' => 'Semestral',
            'registred' => null
        ]);
        Payment_frequency::create([
            'name' => 'Anual',
            'registred' => null
        ]);

        City::create([
            'name' => 'Bogotá',
            'registred' => null
        ]);
        City::create([
            'name' => 'Cali',
            'registred' => null
        ]);
        City::create([
            'name' => 'Neiva',
            'registred' => null
        ]);

        Sport::create([
            'name' => 'Actividades Subacuáticas'
        ]);
        Sport::create([
            'name' => 'Ajedrez'
        ]);
        Sport::create([
            'name' => 'Arqueros de Colombia'
        ]);
        Sport::create([
            'name' => 'Atletismo'
        ]);
        Sport::create([
            'name' => 'Automovilismo'
        ]);
        Sport::create([
            'name' => 'Bádminton'
        ]);
        Sport::create([
            'name' => 'Baile Deportivo'
        ]);
        Sport::create([
            'name' => 'Baloncesto'
        ]);
        Sport::create([
            'name' => 'Balón pesado'
        ]);

        Sport::create([
            'name' => 'Balonmano'
        ]);
        Sport::create([
            'name' => 'Béisbol'
        ]);

        Sport::create([
            'name' => 'Billar'
        ]);
        Sport::create([
            'name' => 'Bowling'
        ]);

        Sport::create([
            'name' => 'Boxeo'
        ]);

        Sport::create([
            'name' => 'Bridge'
        ]);
        Sport::create([
            'name' => 'Canotaje'
        ]);

        Sport::create([
            'name' => 'Ciclismo'
        ]);

        Sport::create([
            'name' => 'Coleo'
        ]);
        Sport::create([
            'name' => 'Deportes Aéreos'
        ]);
        Sport::create([
            'name' => 'Disco Volador'
        ]);
        Sport::create([
            'name' => 'Ecuestre'
        ]);
        Sport::create([
            'name' => 'Escalada Deportiva'
        ]);
        Sport::create([
            'name' => 'Esgrima'
        ]);
        Sport::create([
            'name' => 'Esquí Náutico'
        ]);
        Sport::create([
            'name' => 'Fisicoculturismo'
        ]);
        Sport::create([
            'name' => 'Fútbol'
        ]);

        Sport::create([
            'name' => 'Fútbol de Salón'
        ]);

        Sport::create([
            'name' => 'Gimnasia'
        ]);

        Sport::create([
            'name' => 'Golf'
        ]);

        Sport::create([
            'name' => 'Hapkido'
        ]);

        Sport::create([
            'name' => 'Hockey sobre Césped'
        ]);
        Sport::create([
            'name' => 'Hockey sobre Hielo'
        ]);
        Sport::create([
            'name' => 'Jiu Jitsu'
        ]);
        Sport::create([
            'name' => 'Judo'
        ]);
        Sport::create([
            'name' => 'Karate Do'
        ]);
        Sport::create([
            'name' => 'Karts'
        ]);
        Sport::create([
            'name' => 'Kick Boxin'
        ]);
        Sport::create([
            'name' => 'Levantamiento de Pesas'
        ]);
        Sport::create([
            'name' => 'levantamiento de potencia'
        ]);
        Sport::create([
            'name' => 'Lucha'
        ]);
        Sport::create([
            'name' => 'Montaña y Escalada'
        ]);
        Sport::create([
            'name' => 'Motociclismo'
        ]);
        Sport::create([
            'name' => 'Motonáutica'
        ]);
        Sport::create([
            'name' => 'Muay thai'
        ]);
        Sport::create([
            'name' => 'Natación'
        ]);
        Sport::create([
            'name' => 'Orientación'
        ]);
        Sport::create([
            'name' => 'Patinaje'
        ]);
        Sport::create([
            'name' => 'Pelota a Mano Chaza'
        ]);
        Sport::create([
            'name' => 'Pezca Deportiva'
        ]);
        Sport::create([
            'name' => 'Porrismo'
        ]);
        Sport::create([
            'name' => 'Racquetball'
        ]);
        Sport::create([
            'name' => 'Remo'
        ]);
        Sport::create([
            'name' => 'Rugby'
        ]);
        Sport::create([
            'name' => 'Sambo'
        ]);
        Sport::create([
            'name' => 'Savate'
        ]);
        Sport::create([
            'name' => 'Sóftbol'
        ]);
        Sport::create([
            'name' => 'Squash'
        ]);
        Sport::create([
            'name' => 'Surf'
        ]);

        Provider_types::create([
            'name' => 'Hotel',
            'registred' => null
        ]);
        Provider_types::create([
            'name' => 'Implementos deportivos',
            'registred' => null
        ]);
        Provider_types::create([
            'name' => 'Agencia de viajes',
            'registred' => null
        ]);
        Provider_types::create([
            'name' => 'restaurante',
            'registred' => null
        ]);

        $frecuencias = Payment_frequency::all();
        $membresias = Role::where('id', '>=', '3')->get();

        foreach ($membresias as $membresia) {
            foreach ($frecuencias as $frecuencia) {
                $price = rand(1, 9);
                Membership_price::create([
                    'payment_frequency_id' => $frecuencia->id,
                    'role_id' => $membresia->id,
                    'price' => $price * 1000000
                ]);
            }
        }
    }
}
