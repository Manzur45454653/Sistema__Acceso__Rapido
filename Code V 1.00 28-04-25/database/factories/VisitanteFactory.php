<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VisitanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido_materno' => $this->faker->lastName(),
            'apellido_paterno' => $this->faker->lastName(),
            'motivo' => $this->faker->sentence(10),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'menor' => $this->faker->randomElement(['0', '1']),
            'identificacion' =>  $this->faker->imageUrl(640, 480, 'people', true, 'persona'),
            'code_qr' =>  $this->faker->imageUrl(640, 480, 'people', true, 'persona'),
            'reactivacion' => $this->faker->randomElement(['0', '1']),
            // Solo tiene una fecha
            // 'fechas_impresion' => json_encode([
            //     $this->faker->dateTime()->format('Y-m-d H:i:s')
            // ]),
            // Si necesitamos que tenga más fechas
            'fechas_impresion' => json_encode([
                $this->faker->dateTimeBetween('-1 week', 'now')->format('Y-m-d H:i:s'),
                $this->faker->dateTimeBetween('-1 week', 'now')->format('Y-m-d H:i:s')
            ]),            
        ];
    }
}
