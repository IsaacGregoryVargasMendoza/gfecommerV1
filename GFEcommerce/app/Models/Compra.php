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

    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'idProveedor');
    }

    public function trabajador(){
        return $this->belongsTo(Trabajador::class,'idTrabajador');
    }

    public function tipoComprobante(){
        return $this->belongsTo(TipoComprobante::class,'idTipoComprobante');
    }

    public function caja(){
        return $this->belongsTo(Caja::class,'idCaja');
    }

    public function medioPago(){
        return $this->belongsTo(Caja::class,'idMedioPago');
    }

    public function detalleCompra(){
        return $this->hasMany(DetalleCompra::class,'idCompra');
    }
}
