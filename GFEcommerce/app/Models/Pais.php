<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = "pais";

    protected $primaryKey = "idPais";

    protected $fillable = [
        "codigo",
        "nombre"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }

    public function departamentos(){
        return $this->hasMany(Departamento::class,'idDepartamento');
    }
}
