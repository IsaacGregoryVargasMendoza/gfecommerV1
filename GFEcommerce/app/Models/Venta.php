<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = "venta";

    protected $primaryKey = "idVenta";

    protected $fillable = [
        "numeroDocumento",
        "denominacionCliente",
        "direccionCliente",
        "fechaEmision",
        "serie",
        "correlativo",
        "subTotal",
        "igv",
        "total",
        "idCliente",
        "idTrabajador",
        "idTipoComprobante",
        "idCaja",
        "idMedioPago"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
