<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comunidad;

class ComunidadSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Semillas
        Comunidad::create([
            'id_institucional' => '214964577',
            'nombre' => 'Sergio',
            'apellido_materno' => 'Domingo',
            'apellido_paterno' => 'Morán',
            'id_plantel' => random_int(1, 7),
            'id_puesto' => '1',
            'id_oferta' =>  random_int(2, 13),
            'estado' => '1',
            'fotografia' => 'get_comunidad/214964577/identificacion_QIe8L3Uj8FvpTqF.jpg',
            'code_qr' =>  'get_comunidad/214964577/qr_0VKBZQiYuK7CLOs9bo90.png', 
        ]);         

        Comunidad::create([
            'id_institucional' => '215755923',
            'nombre' => 'Ingrid',
            'apellido_materno' => 'Navas',
            'apellido_paterno' => 'Delgadillo',
            'id_plantel' => random_int(1, 7),
            'id_puesto' => '1',
            'id_oferta' =>  random_int(2, 13),
            'estado' => '1',
            'fotografia' => 'get_comunidad/215755923/identificacion_cSBxZQgabedoeRf.jpg',
            'code_qr' =>  'get_comunidad/215755923/qr_bMTYGsPqDxztSGJr9p0J.png', 
        ]); 

        Comunidad::create([
            'id_institucional' => '247058159',
            'nombre' => 'Astrid',
            'apellido_materno' => 'Quiroz',
            'apellido_paterno' => 'Reyna',
            'id_plantel' => random_int(1, 7),
            'id_puesto' => '1',
            'id_oferta' =>  random_int(2, 13),
            'estado' => '1',
            'fotografia' => 'get_comunidad/247058159/identificacion_6jO599HZyBkt5po.jpg',
            'code_qr' =>  'get_comunidad/247058159/qr_gC8pVNy1RdtHhZBxSrtC.png', 
        ]);         

        Comunidad::create([
            'id_institucional' => '267557997',
            'nombre' => 'Farid',
            'apellido_materno' => 'Griego',
            'apellido_paterno' => 'Puig',
            'id_plantel' => random_int(1, 7),
            'id_puesto' => '1',
            'id_oferta' =>  random_int(2, 13),
            'estado' => '1',
            'fotografia' => 'get_comunidad/267557997/identificacion_slXZAtOUU5YUe08.jpg',
            'code_qr' =>  'get_comunidad/267557997/qr_NM7kMBTZtiyFEmQRcwNy.png', 
        ]);         

        Comunidad::create([
            'id_institucional' => '286554907',
            'nombre' => 'Daniel',
            'apellido_materno' => 'Carrasco',
            'apellido_paterno' => 'Piñeiro',
            'id_plantel' => random_int(1, 7),
            'id_puesto' => '1',
            'id_oferta' =>  random_int(2, 13),
            'estado' => '1',
            'fotografia' => 'get_comunidad/286554907/identificacion_cGsjOQhJnf8Jvcq.jpg',
            'code_qr' =>  'get_comunidad/286554907/qr_TVI6W0GdA1LSDmX6iI4h.png', 
        ]);         
        // Semillas de prueba
        //Comunidad::factory()->count(50)->create();
    }
}
