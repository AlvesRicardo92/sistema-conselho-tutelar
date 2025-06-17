<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cras extends Model
{
    use HasFactory;

    // Se você optou por ter 'logradouro_id'
    protected $fillable = ['nome', 'telefone', 'email', 'logradouro_id', 'ativo'];

    // Se você optou por ter 'logradouro_id' como FK
    public function logradouro()
    {
        return $this->belongsTo(Logradouro::class);
    }

    // Se você vai precisar de todos os logradouros que este CRAS atende
    public function logradourosAtendidos()
    {
        return $this->hasMany(Logradouro::class, 'cras_id');
    }
}
