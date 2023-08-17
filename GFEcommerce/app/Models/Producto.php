<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    protected $table = "producto";

    protected $primaryKey = "idProducto";

    protected $fillable = [
        "codigo",
        "nombre",
        "descripcion",
        "imagen",
        "visible",
        "estado"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
