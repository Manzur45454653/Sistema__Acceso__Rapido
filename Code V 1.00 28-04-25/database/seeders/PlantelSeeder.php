<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plantele;

class PlantelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ***** Sin usar Factory
        //Semillas de manera manual, NO RECOMENDADO, información real.
        
        Plantele::create([
            'id_plantel' => '1',
            'plantel' => 'Plantel Casa Libertad',
            'direccion' => 'Calzada Ermita Iztapalapa 4163, Colonia Lomas de Zaragoza, Alcaldía Iztapalapa 09620 Ciudad de México',
            'correo' => 'coordinacion.casalibertad@uacm.edu.mx',
            'telefono' => '(55)5858-0538 Ext. 12000',
        ]); 
        
        Plantele::create([
            'id_plantel' => '2',
            'plantel' => 'Plantel Centro Histórico',
            'direccion' => 'Ave. Fray Servando Teresa de Mier 92 y 99, Col. Obrera, Alcaldía Cuauhtémoc C.P. 06080 Ciudad de México',
            'correo' => ' coordinacion.centrohistorico@uacm.edu.mx',
            'telefono' => '(55) 5134 - 9804 Ext. 11750',
        ]); 

        Plantele::create([
            'id_plantel' => '3',
            'plantel' => 'Pantel Cuautepec',
            'direccion' => 'Avenida La Corona No. 320, Colonia Loma la Palma, Alcaldía Gustavo A. Madero, C.P. 07160 Ciudad de México',
            'correo' => 'Sin información',
            'telefono' => '55 5134 9804 Ext. 18122',
        ]); 

        Plantele::create([
            'id_plantel' => '4',
            'plantel' => 'Plantel Del Valle',
            'direccion' => 'Calle San Lorenzo 290, Colonia Del Valle Sur, Alcaldía Benito Juárez C.P. 03100 Ciudad de México',
            'correo' => 'Sin información',
            'telefono' => '55 5488 6661 Ext. 15406',
        ]); 

        Plantele::create([
            'id_plantel' => '5',
            'plantel' => 'Plantel San Lorenzo Tezonco',
            'direccion' => 'Prolongación San Isidro 151, Colonia San Lorenzo Tezonco, Alcaldía Iztapalapa C.P. 09790 Ciudad de México',
            'correo' => 'Sin información',
            'telefono' => '55 5134 9804 Ext. 13062',
        ]); 
        
        Plantele::create([
            'id_plantel' => '6',
            'plantel' => 'Sede Administrativa',
            'direccion' => 'Dr. García Diego No. 168, Colonia Doctores Alcaldía Cuauhtémoc Ciudad de México, C.P. 06720.',
            'correo' => 'coord.administrativos@uacm.edu.mx',
            'telefono' => '1107-0280 Ext. 16000',
        ]); 
        
        Plantele::create([
            'id_plantel' => '7',
            'plantel' => 'Centro Vlady',
            'direccion' => 'Calle Goya núm. 63, Col. Insurgentes Mixcoac, Alcaldía Benito Juárez, México, Ciudad de México, C.P. 03920.',
            'correo' => 'centrovlady@gmail.com',
            'telefono' => '(55) 5611 7691 ',
        ]); 
        
        // Plantele::create([
        //     'id_plantel' => '',
        //     'plantel' => '',
        //     'direccion' => '',
        //     'correo' => '',
        //     'telefono' => '',
        // ]); 
    }
}
