<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Congregacoes;
use App\Models\Estudos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CongregacoesEstudos extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'congregacoes_estudos';
    protected $fillables = [
        'status',
        'estudos_id',
        'congregacoes_id',
    ];

    protected congregacao(){
        return $this->belongsTo(Congregacoes::class, 'congregacoes_id', 'id');
    }

    protected estudo(){
        return $this->belongsTo(Estudos::class, 'estudos_id', 'id');
    }
}
