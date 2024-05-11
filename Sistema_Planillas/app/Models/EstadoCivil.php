<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estados_civiles';
    protected $primaryKey = 'id_estado_civil';  // Indicar la clave primaria
    protected $fillable = ['descripcion'];  // Permitir asignación masiva para 'descripcion'
}
