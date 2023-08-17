<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = "persona";

    protected $primaryKey = "idPersona";

    protected $fillable = [
        "numeroDocumento",
        "nombre",
        "apellidoPaterno",
        "apellidoMaterno",
        "sexo",
        "fechaNacimiento",
        "idTipoDocumento",
        "idPais",
        "idDepartamento",
        "idProvincia",
        "idDistrito"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
