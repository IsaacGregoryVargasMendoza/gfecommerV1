<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $table = "trabajador";

    protected $primaryKey = "idTrabajador";

    protected $fillable = [
        "estado",
        "idPersona",
        "idUsers",
        "idCargo",
        "idSucursalOrigen",
        "idSucursalActual",
        "idMotivoCese"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
