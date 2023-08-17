<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    protected $table = "unidadmedida";

    protected $primaryKey = "idUnidadMedida";

    protected $fillable = [
        "nombre",
        "descripcion",
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
