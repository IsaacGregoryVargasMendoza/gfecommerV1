<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $table = "cliente";

    protected $primaryKey = "idCliente";

    protected $fillable = [
        "numeroDocumento",
        "nombre",
        "apellidoPaterno",
        "apellidoMaterno",
        "sexo",
        "fechaNacimiento",
        "tipo",
        "razonSocial",
        "direccionEmpresa",
        "nombreComercial",
        "idTipoDocumento",
        "idPais",
        "idDepartamento",
        "idProvincia",
        "idDistrito",
        "idUsers"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
