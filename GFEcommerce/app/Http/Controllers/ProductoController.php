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
        if($request->hasfile('imagenProducto')){
            $file = $request->file('imagenProducto');
            $destinoPath = 'imagenes/productos/';
            $nombreArchivo = time() . '-' . $file->getClientOriginalName();
            $carga = $request->file('imagenProducto')->move($destinoPath,$nombreArchivo);
            $producto->imagenProducto = $destinoPath . $nombreArchivo;
        }else {
            $producto->imagenProducto = "imagenes/no_imagen.png";
        }
        
        $producto->codigoProducto = $request->get('codigoProducto');
        $producto->nombreProducto = $request->get('nombreProducto');
        $producto->descripcionProducto = $request->get('descripcionProducto');
        $producto->visibleProducto = $request->get('visibleProducto');
        $producto->idCategoria = $request->get('idCategoria');
        $producto->estadoProducto = 1;

        $producto->save();
    }

    public function show($id){
        $producto = Producto::find($id);
        return $producto;
    }

    public function update(Request $request, $id){
        //var_dump($request);
        $producto = Producto::find($id);
        if($request->hasfile('imagenProducto')){
            $file = $request->file('imagenProducto');
            $destinoPath = 'imagenes/productos/';
            $nombreArchivo = time() . '-' . $file->getClientOriginalName();
            $carga = $request->file('imagenProducto')->move($destinoPath,$nombreArchivo);
            $producto->imagenProducto = $destinoPath . $nombreArchivo;
        }else {
            $producto->imagenProducto = "imagenes/no_imagen.png";
        }
        
        $producto->codigoProducto = $request->get('codigoProducto');
        $producto->nombreProducto = $request->get('nombreProducto');
        $producto->descripcionProducto = $request->get('descripcionProducto');
        $producto->imagenProducto = $request->get('imagenProducto');
        $producto->visibleProducto = $request->get('visibleProducto');
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
