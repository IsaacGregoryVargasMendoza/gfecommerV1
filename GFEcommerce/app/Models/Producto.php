<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable=[
        'codigoProducto',//por definirse
        'nombreProducto',
        'descripcionProducto',
        'stockProducto',
        'stockMinimoProducto',
        'precioCompraProducto',
        'imagenProducto',
        'visibleProducto',
        'estadoProducto',
        'idCategoria'
    ];
}
