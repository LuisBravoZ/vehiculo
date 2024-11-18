<?php

use App\Http\Controllers\VehiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Routes::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Routes::get('/vehiculo',[VehiculoController::class,'index']);
Routes::get('/vehiculo/{id}',[VehiculoController::class,'registro_unico']);
Routes::post('/vehiculo',[VehiculoController::class,'store']);
Routes::put('/vehiculo/{id}',[VehiculoController::class,'update']);
Routes::delete('/vehiculo/{id}',[VehiculoController::class,'destroy']);
