<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $fillable=[
        'cantidadDetalleCompra',
        'precioDetalleCompra',
        'totalDetalleCompra',
        'idCompra',
        'idProducto'
    ];
}
