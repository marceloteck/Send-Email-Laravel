<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelosModel extends Model
{
    use HasFactory;

    protected $table = 'model_email'; // Substitua "nome_da_tabela" pelo nome real da tabela no banco de dados

    protected $fillable = [
        'name',
        'img',
        'localFile',
    ];
}