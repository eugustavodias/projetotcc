<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Congregacoes;
use App\Models\CongregacoesUsers;

class CongregacoesUsersSeeder extends Seeder
{
    public function run(): void {
        $users = User::all();
        $congregacoes = Congregacoes::get()->pluck('id');
        
        foreach($users as $user){
            (new CongregacoesUsers)->create([
                'users_id' => $user->id,
                'congregacoes_id' => $congregacoes->toArray()[array_rand($congregacoes->toArray())]
            ]);
        }
    }
}
