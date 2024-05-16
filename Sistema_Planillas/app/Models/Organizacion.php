<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    protected $table = 'organizaciones';
    protected $primaryKey = 'codigo_organizacion';

    protected $fillable = ['nombre_organizacion', 'representante_legal', 'nit', 'logo', 'sitio_web'];

    public function unidadesOrganizativas()
    {
        return $this->hasMany(UnidadOrganizativa::class, 'codigo_organizacion');
    }
}
