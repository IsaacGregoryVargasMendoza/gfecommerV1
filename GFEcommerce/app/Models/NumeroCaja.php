<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumeroCaja extends Model
{
    use HasFactory;

    protected $table = "numerocaja";

    protected $primaryKey = "idNumeroCaja";

    protected $fillable = [
        "numero",
        "estado",
        "idSucursal"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
