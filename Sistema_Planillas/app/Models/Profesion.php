<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profesion extends Model
{
    protected $primaryKey = 'id_profesion';  // Especifica la clave primaria personalizada
    public $incrementing = true;  // Indica que la clave primaria es autoincremental
    protected $fillable = ['descripcion'];
}
