<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{ /*Características da tabela */
    use HasFactory;
    protected $fillable = [
        'nome',
        'marca',
        'valor'
    ];
}


