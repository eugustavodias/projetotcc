<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Eventos;
use App\Models\Congregacoes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CongregacoesEventos extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'congregacoes_eventos';
    protected $fillable = [
        'status',
        'eventos_id',
        'congregacoes_id'
    ]

    public function evento() {
        return $this->belongsTo(Eventos::class, 'eventos_id', 'id');
    }

    public function congregacao() {
        return $this->belongsTo(Congregacoes::class, 'congregacoes_id', 'id');
    }
}
