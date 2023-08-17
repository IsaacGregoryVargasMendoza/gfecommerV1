<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    use HasFactory;

    protected $table = "presentacion";

    protected $primaryKey = "idPresentacion";

    protected $fillable = [
        "nombre",
        "descripcion",
        "imagen",
        "stock",
        "cantidadMinima",
        "visible",
        "estado",
        "idUnidadMedida",
        "idProducto"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
