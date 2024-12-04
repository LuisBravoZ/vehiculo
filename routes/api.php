<?php

use App\Http\Controllers\VehiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/vehiculo',[VehiculoController::class,'index'])->name("index.vehiculo");
Route::get('/vehiculo/{id}',[VehiculoController::class,'registro_unico'])->name("registro.unico_vehiculo");
Route::post('/vehiculo',[VehiculoController::class,'store'])->name("store.vehiculo");
Route::put('/vehiculo/{id}',[VehiculoController::class,'update'])->name("update.vehiculo");
Route::delete('/vehiculo/{id}',[VehiculoController::class,'destroy'])->name("destroy.vehiculo");
