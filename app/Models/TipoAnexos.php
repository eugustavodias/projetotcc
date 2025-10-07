<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAnexos extends Model
{
    protected $table = 'tipo_anexos';
    protected $fillable = [
        'tipo',
    ];

    public function anexos() {
        return $this->hasMany(Anexos::class, 'anexos_id', 'id');
    }
}
