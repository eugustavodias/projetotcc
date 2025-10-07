<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Financeiro extends Model
{
    use SoftDeletes;
    protected $table = "financeiros";
    protected $fillable = [
        'nome',
        'data',
        'anexo_id'
    ];

    public function anexo() {
        return $this->belongsTo(Anexos::class, 'anexo_id', 'id');
    }
}
