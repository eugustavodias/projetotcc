<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Congregacoes;

class CongregacoesSeeder extends Seeder
{
    public function run(): void
    {
        Congregacoes::create([
            'nome' => 'Igreja Batista Bíblica Betel',
            'sigla' => 'IBBB',
            'rua' => 'Av. Amazonas',
            'numeroendereco' => '340',
            'bairro' => 'Nova Porto Velho'
        ]);
    }
}
