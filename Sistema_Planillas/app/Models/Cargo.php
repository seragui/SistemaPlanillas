<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargo';
    protected $primaryKey = 'codigo_cargo';
    public $incrementing = true; // Indicar que la clave primaria es autoincremental
    protected $keyType = 'int'; // Definir el tipo de la clave primaria

    protected $fillable = [
        'cargo_descripcion',
        'salario_maximo',
        'salario_minimo'
    ];
}
