<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Puesto;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Con eso generas 10 puestos aleatorios de la lista, utilizando Factory
        Puesto::factory()->count(10)->create();
        
    }
}
