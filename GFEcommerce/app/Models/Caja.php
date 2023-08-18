<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;

    protected $table = "caja";

    protected $primaryKey = "idCaja";

    protected $fillable = [
        "fechaApertura",
        "fechaCierre",
        "montoInicial",
        "saldoFinal",
        "saldoSistema",
        "estado",
        "idSucursal",
        "idNumeroCaja"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }

    public function sucursal(){
        return $this->belongsTo(Sucursal::class,'idSucursal');
    }

    public function numeroCaja(){
        return $this->belongsTo(NumeroCaja::class,'idNumeroCaja');
    }

    public function movimientos(){
        return $this->hasMany(MovimientoCaja::class,'idMovimientoCaja');
    }
}
