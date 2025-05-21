<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Services\IdGeneratorService;

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
            // 'id_visitante' => $this->faker->unique()->numberBetween(1100000000, 3999999999),// Solo nos genera números
            // 'id_visitante' => Str::random(20),// generará cadenas aleatorias de 20 caracteres con letras mayúsculas, minúsculas y números.
            'id_visitante' => IdGeneratorService::generateVisitanteId(),
            'nombre' => $this->faker->firstName(),
            'apellido_materno' => $this->faker->lastName(),
            'apellido_paterno' => $this->faker->lastName(),
            'motivo' => $this->faker->sentence(30),
            'menor' => $this->faker->randomElement(['0', '1']),
            //'identificacion' =>  $this->faker->imageUrl(640, 480, 'people', true, 'persona'),
            //'identificacion' => $this->faker->unique()->numberBetween(100000, 999999),// Solo nos genera números
            'identificacion' => $this->faker->randomElement([
                'test_identificacion/INE01.jpg',
                'test_identificacion/INE02.jpg',
                'test_identificacion/INE03.png',
                'test_identificacion/INE04.png',
                ]),            
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
