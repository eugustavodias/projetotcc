<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Congregacoes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CongregacoesUsers extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'congregacoes_users';
    protected $fillable = [
        'status',
        'users_id',
        'congregacoes_id'
    ];

    public function evento() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function congregacao() {
        return $this->belongsTo(Congregacoes::class, 'congregacoes_id', 'id');
    }
}
