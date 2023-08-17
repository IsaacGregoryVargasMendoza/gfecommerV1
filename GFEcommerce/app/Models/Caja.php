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
        "estado"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
