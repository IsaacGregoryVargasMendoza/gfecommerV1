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

    public function empresa(){
        return $this->belongsTo(Empresa::class,'idEmpresa');
    }
}
