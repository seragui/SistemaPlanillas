<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $primaryKey = 'codigo';  // Establece 'codigo' como clave primaria
    public $incrementing = false;  // Desactiva el incremento automático
    protected $keyType = 'string';  // Establece el tipo de clave como string
    protected $fillable = ['codigo', 'nombre'];  // Atributos asignables masivamente
}
