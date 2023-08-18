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

    public function cliente(){
        return $this->belongsTo(Cliente::class,'idCliente');
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
        return $this->belongsTo(Cliente::class,'idCliente');
    }
}
