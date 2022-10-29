<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UnidadMedidaController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CategoriaController::class)->group(function () {
    Route::get("/categorias","index");
    Route::post("/categoria","store");
    Route::get("/categoria/{id}","show");
    Route::put("/categoria/{id}","update");
    Route::delete("/categoria/{id}","destroy");//si se borra de raiz se utiliza Route::delete
});

Route::controller(UnidadMedidaController::class)->group(function () {
    Route::get("/unidadesDeMedida","index");
    Route::post("/unidadDeMedida","store");
    Route::get("/unidadDeMedida/{id}","show");
    Route::put("/unidadDeMedida/{id}","update");
    Route::delete("/unidadDeMedida/{id}","destroy");//si se borra de raiz se utiliza Route::delete
});