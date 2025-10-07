<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\Anexos;
use App\Models\Congregacoes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'rg',
        'telefone',
        'nomepai',
        'nomemae',
        'cep',
        'rua',
        'numeroendereco',
        'bairro',
        'idade',
        'anexos_id',
        'tipo_usuario_id'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function anexos() {
        return $this->hasMany(Anexos::class, 'anexos_id', 'id');
    }

    public function tipo_usuario() {
        return $this->belongsTo(TipoUsuarios::class, 'tipo_usuario_id', 'id');
    }

    public function congregacoes() {
        return $this->hasMany(Congregacoes::class, 'congregacoes_id', 'id');
    }
}
