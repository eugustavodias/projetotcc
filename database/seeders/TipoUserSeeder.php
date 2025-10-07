<?php

namespace Database\Seeders;

use App\Models\TiposUsuarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TiposUsuarios::create([
            'nome' => 'Gestor'
        ]);

        TiposUsuarios::create([
            'nome' => 'Membro'
        ]);
    }
}
