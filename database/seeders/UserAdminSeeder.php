<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt(123),
            'cpf' => '12345678910',
            'rg' => '1234567',
            'telefone' => '69321498564',
            'nomepai' => 'Pai Admin',
            'nomemae' => 'Mãe Admin', 
            'rua' => 'Abunã',
            'numeroendereco' => '2648',
            'bairro' => 'Joaquim Nabuco',
            'idade' => 100,
            'tipo_usuario_id' => 1
        ]);
    }
}
