<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'celular',
        'CPF',
        'email',
        'dataNascimento',
        'cidade',
        'estado',
        'país',
        'rua',
        'numero',
        'bairro',
        'CEP'

    ];

}
