<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposEventos extends Model
{
    protected $table = "tipos_eventos";
    protected $fillable = [
        'nome',
        'status',
    ];
}
