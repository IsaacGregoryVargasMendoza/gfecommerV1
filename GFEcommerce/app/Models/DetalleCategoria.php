<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCategoria extends Model
{
    use HasFactory;
    protected $table = "detallecategoria";

    protected $primaryKey = "idDetalleCategoria";

    protected $fillable = [
        "idProducto",
        "idCategoria"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
