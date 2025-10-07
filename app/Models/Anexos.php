<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Anexos extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'anexos';
    protected $fillable = [
        'titulo',
        'descricao',
        'caminho',
        'tipo_anexos_id'
    ];
}
