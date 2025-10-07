<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Anexos;
use App\Models\Congregacoes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Estudos extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'estudos';
    protected $fillable = [
        'nome',
        'data',
        'link',
        'anexos_id',
        'anexo_thumb_id',
    ];

    public function anexo() {
        return $this->belongsTo(Anexos::class, 'anexos_id', 'id');
    }
}
