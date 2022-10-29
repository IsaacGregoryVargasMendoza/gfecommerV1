<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::where('estadoProducto',1)->get();
        return $productos;
    }

    public function store(Request $request){
        $producto = new Producto();
        $producto->nombreProducto = $request->get('nombreProducto');
        $producto->descripcionProducto = $request->get('descripcionProducto');
        $producto->stockProducto = $request->get('stockProducto');
        $producto->stockMinimoProducto = $request->get('stockMinimoProducto');
        $producto->precioCompraProducto = $request->get('precioCompraProducto');
        $producto->imagenProducto = $request->get('imagenProducto');
        $producto->visibleProducto = $request->get('visibleProducto');
        $producto->idUnidadMedida = $request->get('idUnidadMedida');
        $producto->idCategoria = $request->get('idCategoria');
        $producto->estadoProducto = 1;

        $producto->save();
    }

    public function show($id){
        $producto = Producto::find($id);
        return $producto;
    }

    public function update(Request $request, $id){
        $producto = Producto::find($id);
        $producto->nombreProducto = $request->get('nombreCategoria');
        $producto->descripcionProducto = $request->get('descripcionProducto');
        $producto->stockProducto = $request->get('stockProducto');
        $producto->stockMinimoProducto = $request->get('stockMinimoProducto');
        $producto->precioCompraProducto = $request->get('precioCompraProducto');
        $producto->imagenProducto = $request->get('imagenProducto');
        $producto->visibleProducto = $request->get('visibleProducto');
        $producto->idUnidadMedida = $request->get('idUnidadMedida');
        $producto->idCategoria = $request->get('idCategoria');
        $producto->estadoProducto = 1;

        $producto->save();
        return $producto;
    }

    public function destroy($id){
        $producto = Producto::find($id);
        $producto->estadoProducto = 0;

        $producto->save();
        return $producto;
    }
}
