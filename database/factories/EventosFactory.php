<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eventos>
 */
class EventosFactory extends Factory
{
    public function definition(): array
    {
        $data_inicio = fake()->dateTimeBetween('-5 years', 'now');
        $data_fim = fake()->dateTimeInInterval($data_inicio, "+ ".fake()->randomDigit()." days");
        return [
            'titulo' => fake()->word,
            'descricao' => fake()->words(20, true),
            'data_inicio' => $data_inicio,
            'data_fim' => $data_fim,
            'link' => fake()->url,
            'anexos_id' => 1,
            'tipos_eventos_id' => (
                date('Y-m-d') < $data_fim ? 1 : 2
            )
        ];
    }
}
