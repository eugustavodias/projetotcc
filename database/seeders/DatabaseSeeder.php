<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // PROD
            TipoAnexosSeeder::class,
            AnexosSeeder::class,
            CongregacoesSeeder::class,
            TipoUserSeeder::class,
            UserAdminSeeder::class,
            TiposEventosSeeder::class

            // DEV
            /*
            TipoAnexosSeeder::class,
            AnexosSeeder::class,
            CongregacoesSeeder::class,
            TipoUserSeeder::class,
            UserAdminSeeder:class,
            UsersSeeder::class,
            CongregacoesUsersSeeder::class,
            TiposEventosSeeder::class,
            EventosSeeder::class,
            */
        ]);
    }
}
