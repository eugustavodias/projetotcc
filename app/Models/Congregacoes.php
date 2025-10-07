<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CongregacoesEstudos;
use App\Models\CongregacoesEventos;
use App\Models\CongregacoesUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Congregacoes extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'congregacoes';
    protected $fillables = [
        'nome',
        'sigla',
        'rua',
        'numeroendereco',
        'bairro'
    ];

    public function estudos() {
        return $this->hasMany(CongregacoesEstudos::class, 'congregacoes_id', 'id');
    }

    public function eventos() {
        return $this->hasMany(CongregacoesEventos::class, 'congregacoes_id', 'id');
    }

    public function users() {
        return $this->hasMany(CongregacoesUsers::class, 'congregacoes_id', 'id');
    }
}
