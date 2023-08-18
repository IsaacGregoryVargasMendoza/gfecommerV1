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

    public function persona(){
        return $this->belongsTo(Persona::class,'idPersona');
    }

    public function users(){
        return $this->belongsTo(User::class,'idUsers');
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class,'idCargo');
    }

    public function sucursalOrigen(){
        return $this->belongsTo(Sucursal::class,'idSucursalOrigen');
    }

    public function sucursalActual(){
        return $this->belongsTo(Sucursal::class,'idSucursalOrigen');
    }

    public function motivoCese(){
        return $this->belongsTo(MotivoCese::class,'idMotivoCese');
    }
}
