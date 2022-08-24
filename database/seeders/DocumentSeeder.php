<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Document_type;
use App\Models\Provider_type;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document_type::create([
            'name' => 'Reconocimiento Deportivo',
        ]);
        Document_type::create([
            'name' => 'Cámara de comercio',
        ]);
        Document_type::create([
            'name' => 'Registro tributario',
        ]);
        Document_type::create([
            'name' => 'Presupuesto anual',
        ]);
    }
}
