<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Eventos;

class EventosSeeder extends Seeder
{
    public function run(): void {
        Eventos::factory()->count(50)->create();
    }
}
