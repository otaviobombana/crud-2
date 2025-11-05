<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // 🔥 Isso é essencial!
    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
    ];

    // (opcional, se sua tabela não for "clientes")
    // protected $table = 'clientes';
}
