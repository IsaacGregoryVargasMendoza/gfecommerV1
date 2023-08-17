<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
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
        "idVenta"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
