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

    public function usuario(){
        return $this->belongsTo(User::class,'idDistrito');
    }
}
