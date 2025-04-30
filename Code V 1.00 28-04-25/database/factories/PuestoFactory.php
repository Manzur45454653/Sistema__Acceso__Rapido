<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PuestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $puestos = [
            'Profesor',
            'Director',
            'Coordinador Académico',
            'Secretario',
            'Bibliotecario',
            'Técnico de Laboratorio',
            'Administrador',
            'Vigilante',
            'Recepcionista',
            'Jefe de Carrera',
        ];

        return [
            // Con eso generas 10 puestos aleatorios de la lista.
            // 'puesto' => $this->faker->randomElement($puestos),       
        ];        

    }
}
