<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = "empresa";

    protected $primaryKey = "idEmpresa";

    protected $fillable = [
        "numeroDocumento",
        "denominacion",
        "domicilioFiscal",
        "actividadEconomica",
        "nombreComercial",
        "logoEmpresa",
        "logoDocumento"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
