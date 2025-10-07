<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoAnexos;

class TipoAnexosSeeder extends Seeder
{
    public function run(): void {
        TipoAnexos::create([
            'tipo' => 'Nenhum',
        ]);
        
        TipoAnexos::create([
            'tipo' => 'Documento',
        ]);

        TipoAnexos::create([
            'tipo' => 'Imagem',
        ]);

        TipoAnexos::create([
            'tipo' => 'Video',
        ]);

        TipoAnexos::create([
            'tipo' => 'Livro',
        ]);
    }
}
