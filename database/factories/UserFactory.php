<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName().' '.fake()->lastName().' '.fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt(123),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'cpf' => fake()->cpf(false),
            'rg' => fake()->rg(false),
            'telefone' => fake()->phoneNumber(),
            'nomepai' => fake()->firstNameMale().' '.fake()->lastName(),
            'nomemae' => fake()->firstNameFemale().' '.fake()->lastName(),
            'cep' => fake()->postcode(),
            'rua' => fake()->streetName(),
            'numeroendereco' => fake()->buildingNumber(),
            'bairro' => fake()->streetSuffix(),
            'idade' => fake()->randomDigit()+20,
            'tipo_usuario_id' => (fake()->randomDigit() >= 1 ? 1 : 2)
        ];
    }
}
