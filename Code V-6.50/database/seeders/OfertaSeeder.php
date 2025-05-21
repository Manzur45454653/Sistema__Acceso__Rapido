<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Oferta;

class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Si queremos información exacta de la lista
        $oferta = [
            'Trabajador',
            'Licenciatura en Arte y Patrimonio Cultural',
            'Licenciatura en Ciencia Política y Administración Urbana',
            'Licenciatura en Ciencias Sociales',
            'Licenciatura en Comunicación y Cultura',
            'Licenciatura en Creación Literaria',
            'Licenciatura en Filosofía e Historia de las Ideas',
            'Licenciatura en Historia y Sociedad Contemporánea',
            'Licenciatura en Derecho',
            'Maestría en Defensa y Promoción de los Derechos Humanos',
            'Maestría Ciencias Sociale',
            'Maestría y Doctorado en Estudios Semióticos',
            'Licenciatura en Ciencias Ambientales',
            'Licenciatura en Nutrición y Salud',
            'Licenciatura en Protección Civil y Gestión de Riesgos',
            'Posgrado Ciencias de la Complejidad',
            'Maestría Educación Ambienta',
            'Centro De Estudios Sobre la Ciudad',
            'Licenciatura en Ciencias Genómicas',
            'ic. en Ingeniería en Sistemas de Transporte Urbano',
            'Lic. en Ingeniería en Sistemas Electrónicos Industriales',
            'Ingeniería de Software',
            'Lic. en Ingeniería en Sistemas Electrónicos y de Telecomunicaciones',
            'Lic. en Ingeniería en Sistemas Energéticos',
            'Licenciatura en Modelación Matemática',
            'Posgrado Ciencias Genómicas',
            'Maestria en Ingeniería Energética',
        ];
    
        foreach ($oferta as $nombre) {
            Oferta::create([
                'oferta' => $nombre,
            ]);
        } 
    }
}
