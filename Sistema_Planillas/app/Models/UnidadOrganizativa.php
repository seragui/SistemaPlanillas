<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadOrganizativa extends Model
{
    protected $table = 'unidades_organizativas';
    protected $primaryKey = 'codigo_unidad';

    protected $fillable = ['codigo_organizacion', 'nombre_unidad', 'codigo_estructura'];

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class, 'codigo_organizacion');
    }

    public function unidadPadre()
    {
        return $this->belongsTo(self::class, 'codigo_estructura', 'codigo_unidad');
    }

    public function unidadesHijas()
    {
        return $this->hasMany(self::class, 'codigo_estructura', 'codigo_unidad');
    }
}
