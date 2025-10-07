<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiposUsuarios extends Model
{
    use SoftDeletes;
    protected $table = "tipo_usuarios";
    protected $fillable = [
        'nome',
        'status'
    ];
}
