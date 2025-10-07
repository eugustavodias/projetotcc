<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Eventos extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'eventos';
    protected $fillable = [
        'titulo',
        'descricao',
        'data_inicio',
        'data_fim',
        'link',
        'anexos_id',
        'tipos_eventos_id',
    ];

    public function anexo() {
        return $this->belongsTo(Anexos::class, 'anexos_id', 'id');
    }

    public function tipo_evento() {
        return $this->belongsTo(TiposEventos::class, 'tipos_eventos_id', 'id');
    }

    public function congregacao() {
        return $this->hasMany(Congregacoes::class, 'id', 'congregacoes_id');
    }

    public function listCultos() {
        return DB::table($this->table.' as e')
            ->join('anexos as a', 'a.id', '=', 'e.anexos_id')
            ->select('e.*', 'e.id as evento_id', 'a.*', 'a.id as anexo_id')
            ->where('a.tipo_anexos_id', 4)
            ->paginate(8);
    }
}
