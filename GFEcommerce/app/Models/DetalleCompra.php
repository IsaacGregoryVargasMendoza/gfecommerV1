<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = "detallecompra";

    protected $primaryKey = "idDetalleCompra";

    protected $fillable = [
        "cantidad",
        "precio",
        "total",
        "descuento",
        "observacion",
        "idPresentacion",
        "idAlmacen",
        "idCompra"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
