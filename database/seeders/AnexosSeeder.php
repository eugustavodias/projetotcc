<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anexos;

class AnexosSeeder extends Seeder
{
    public function run(): void {
        Anexos::create([
            'titulo' => 'Sem arquivo',
            'caminho' => 'anexos/semFoto.jpg',
            'descricao' => 'Sem arquivo',
            'tipo_anexos_id' => 1
        ]);
    }
}
