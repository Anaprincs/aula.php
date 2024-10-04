<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'celular',
        'CPF',
        'email',
        'nascimento',
        'cidade',
        'estado',
        'pais',
        'rua',
        'numero',
        'bairro',
        'CEP'
    ];
}
