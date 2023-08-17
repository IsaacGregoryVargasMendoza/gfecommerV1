<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //idCategoria, nombre, descripcion, archivado
    protected $table = "categoria";

    protected $primaryKey = "idCategoria";

    protected $fillable = [
        "nombre",
        "descripcion"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
