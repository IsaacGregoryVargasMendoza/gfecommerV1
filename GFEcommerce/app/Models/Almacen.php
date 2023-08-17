<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    protected $table = "almacen";

    protected $primaryKey = "idAlmacen";

    protected $fillable = [
        "nombre",
        "descripcion",
        "codigo",
        "direccion",
        "idEmpresa",
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
