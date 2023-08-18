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

    public function empresa(){
        return $this->belongsTo(Empresa::class,'idEmpresa');
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
