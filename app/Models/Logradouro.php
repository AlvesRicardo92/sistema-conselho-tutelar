<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logradouro extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'vila',
        'bairro',
        'cras_id',
        'territorio_conselho_tutelar_id',
        'ativo'
    ];

    public function cras()
    {
        return $this->belongsTo(Cras::class);
    }

    public function territorioConselhoTutelar()
    {
        return $this->belongsTo(TerritorioConselhoTutelar::class);
    }
}
