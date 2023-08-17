<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = "sucursal";

    protected $primaryKey = "idSucursal";

    protected $fillable = [
        "nombre",
        "direccion",
        "fechaApertura",
        "horarioAtencion",
        "estado",
        "idPais",
        "idDepartamento",
        "idProvincia",
        "idDistrito",
        "idEmpresa"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
