<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cultos extends Model
{
    use SoftDeletes;
    protected $table = "cultos";
    protected $fillable = [
        'nome',
        'descricao',
        'data',
        'link'
    ];

    public function anexo() {
        return $this->belongsTo(Anexos::class, 'anexo_id', 'id');
    }
}
