<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    // Nome da tabela
    protected $table = 'fornecedores';

    // Chave primária correta
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'int';

    // Campos permitidos para inserção
    protected $fillable = [
        'nome',
        'telefone',
    ];
}
