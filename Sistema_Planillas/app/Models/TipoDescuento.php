<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDescuento extends Model
{
   
    protected $table = 'tipo_descuentos';
    protected $primaryKey = 'id_descuento';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
    ];
}
