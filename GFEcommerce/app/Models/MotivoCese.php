<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoCese extends Model
{
    use HasFactory;

    protected $table = "motivocese";

    protected $primaryKey = "idMotivoCese";

    protected $fillable = [
        "nombre",
        "descripcion"
    ];

    public function scopeNoArchivados($query)
    {
        return $query->where('archivado', 0);
    }
}
