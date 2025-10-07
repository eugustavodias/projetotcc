<?php

namespace Database\Seeders;

use App\Models\TiposEventos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposEventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TiposEventos::create([
            'nome' => 'Aberto',
        ]);
        
        TiposEventos::create([
            'nome' => 'Encerrado',
        ]);
    }
}
