<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';
    protected $primaryKey = 'codigo_presupuesto';

    protected $fillable = ['codigo_unidad_organizativa', 'monto'];

    public function unidadOrganizativa()
    {
        return $this->belongsTo(UnidadOrganizativa::class, 'codigo_unidad_organizativa');
    }
}
