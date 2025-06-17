<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_procedimento',
        'ano_procedimento',
        'nome_pessoa_atendida',
        'nome_genitora_pessoa_atendida',
        'data_nascimento_pessoa_atendida',
        'sexo_id',
        'logradouro_id',
        'origem_criacao',
        'data_hora_criacao',
        'criado_por_user_id',
        'data_hora_atualizacao',
        'atualizado_por_user_id',
    ];

    protected $casts = [
        'data_nascimento_pessoa_atendida' => 'date',
        'data_hora_criacao' => 'datetime',
        'data_hora_atualizacao' => 'datetime',
    ];

    public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }

    public function logradouro()
    {
        return $this->belongsTo(Logradouro::class);
    }

    public function criadoPor()
    {
        return $this->belongsTo(User::class, 'criado_por_user_id');
    }

    public function atualizadoPor()
    {
        return $this->belongsTo(User::class, 'atualizado_por_user_id');
    }
}
