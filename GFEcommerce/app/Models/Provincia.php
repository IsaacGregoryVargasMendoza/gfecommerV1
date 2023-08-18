<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = "provincia";

    protected $primaryKey = "idProvincia";

    protected $fillable = [
        "nombre",
        "idDepartamento"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class,'idDepartamento');
    }

    public function distritos(){
        return $this->hasMany(Distrito::class,'idDistrito');
    }
}
