<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoComprobante extends Model
{
    use HasFactory;

    protected $table = "tipocomprobante";

    protected $primaryKey = "idTipoComprobante";

    protected $fillable = [
        "nombre",
        "serie",
        "correlativo"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
