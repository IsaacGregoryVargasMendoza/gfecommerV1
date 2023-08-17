<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoCaja extends Model
{
    use HasFactory;

    protected $table = "movimientocaja";

    protected $primaryKey = "idMovimientoCaja";

    protected $fillable = [
        "monto",
        "tipo",
        "descripcion",
        "fechaHora",
        "idCaja"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
