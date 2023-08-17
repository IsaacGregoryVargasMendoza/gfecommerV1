<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = "compra";

    protected $primaryKey = "idCompra";

    protected $fillable = [
        "numeroDocumento",
        "denominacionProveedor",
        "direccionProveedor",
        "fechaEmision",
        "serie",
        "correlativo",
        "subTotal",
        "igv",
        "total",
        "idProveedor",
        "idTrabajador",
        "idTipoComprobante",
        "idCaja",
        "idMedioPago",
        "estado"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
