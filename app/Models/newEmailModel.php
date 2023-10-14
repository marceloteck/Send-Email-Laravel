<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newEmailModel extends Model
{
    use HasFactory;

    protected $table = 'new_email'; // Substitua "nome_da_tabela" pelo nome real da tabela no banco de dados

    protected $fillable = [
        'emails',
        'assunto',
        'idModelo',
    ];
}