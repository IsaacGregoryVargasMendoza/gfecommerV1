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

    public function detalleCategoria(){
        return $this->hasMany(DetalleCategoria::class,'idProducto');
    }

    public function presentaciones(){
        return $this->hasMany(Presentacion::class,'idPresentacion');
    }
}
