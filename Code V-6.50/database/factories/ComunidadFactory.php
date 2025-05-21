<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comunidad>
 */
class ComunidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'id_institucional' => $this->faker->unique()->numberBetween(210000000, 299999999),
            'nombre' => $this->faker->firstName(),
            'apellido_materno' => $this->faker->lastName(),
            'apellido_paterno' => $this->faker->lastName(),
            'id_plantel' => random_int(1, 7),
            'id_puesto' => random_int(1, 13),
            'id_oferta' =>  random_int(1, 13),
            'estado' => $this->faker->randomElement(['0', '1']),
            'fotografia' => $this->faker->randomElement([
                'test_comunidad/01.jpg',
                'test_comunidad/02.jpg',
                'test_comunidad/03.jpg',
                'test_comunidad/05.jpg',
                'test_comunidad/06.jpg',
                'test_comunidad/07.jpg',
                'test_comunidad/08.jpg',
                'test_comunidad/09.jpg',
                'test_comunidad/10.jpg',
                'test_comunidad/11.jpg',
                'test_comunidad/12.jpg',
                'test_comunidad/13.jpg',
                'test_comunidad/14.png',
                'test_comunidad/15.jpg',
                'test_comunidad/16.jpg',
                'test_comunidad/17.jpg',
                'test_comunidad/18.jpg',
                'test_comunidad/19.jpg',
                'test_comunidad/20.jpg',
                'test_comunidad/21.jpg',
                'test_comunidad/22.jpg',
                'test_comunidad/23.jpg',
                'test_comunidad/24.png',
                'test_comunidad/25.jpg',
                'test_comunidad/26.jpg',
                'test_comunidad/27.jpg',
                'test_comunidad/28.jpg',
                'test_comunidad/29.jpg',
                'test_comunidad/30.png',
                'test_comunidad/31.jpg',
                'test_comunidad/32.jpg',
                'test_comunidad/33.jpg',
                ]),
            'code_qr' =>  $this->faker->imageUrl(640, 480, 'people', true, 'persona'),            
        ];
    }
}
