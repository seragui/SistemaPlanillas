<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIngreso extends Model
{
    use HasFactory;

    protected $table = 'tipo_ingresos';
    protected $primaryKey = 'id_ingreso';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
    ];
}
