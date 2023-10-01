<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professionalModel extends Model
{
    use HasFactory;

    protected $table = 'professional'; // Substitua "nome_da_tabela" pelo nome real da tabela no banco de dados

    protected $fillable = [
        'name',
        'job',
        'email',
        'whatsapp',
        'codtecno',
        'linkedin',
        'github',
        'facebook',
    ];
}