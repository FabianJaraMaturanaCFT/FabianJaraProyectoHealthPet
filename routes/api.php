<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pets', [PetController::class, 'index']);
Route::post('/pets', [PetController::class, 'store']);
Route::get('/pets/{pet}', [PetController::class, 'show']);
Route::put('/pets/{pet}', [PetController::class, 'update']);
Route::delete('/pets/{pet}', [PetController::class, 'destroy']);
Route::get('/pets/especie/{especie}', [PetController::class, 'filtrarPorEspecie']);
