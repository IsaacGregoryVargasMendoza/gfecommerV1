<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = "proveedor";

    protected $primaryKey = "idProveedor";

    protected $fillable = [
        "numeroDocumento",
        "nombre",
        "apellidoPaterno",
        "apellidoMaterno",
        "sexo",
        "fechaNacimiento",
        "razonSocial",
        "direccion",
        "nombreComercial",
        "estado",
        "tipo",
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

    public function tipoDocumento(){
        return $this->belongsTo(TipoDocumento::class,'idTipoDocumento');
    }

    public function pais(){
        return $this->belongsTo(Pais::class,'idPais');
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class,'idDepartamento');
    }

    public function provincia(){
        return $this->belongsTo(Provincia::class,'idProvincia');
    }

    public function distrito(){
        return $this->belongsTo(Distrito::class,'idDistrito');
    }
}
