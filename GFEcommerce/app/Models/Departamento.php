<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = "departamento";

    protected $primaryKey = "idDepartamento";

    protected $fillable = [
        "nombre",
        "idPais"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }

    public function pais(){
        return $this->belongsTo(Pais::class,'idPais');
    }

    public function provincias(){
        return $this->hasMany(Provincia::class,'idProvincia');
    }
}
