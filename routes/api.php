<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/usuarios', [ContactoController::class, 'index']);
Route::get('/usuario/{idUsuario}', [ContactoController::class, 'show']);
Route::post('/usuario/add', [ContactoController::class, 'store']);
Route::put('/usuario/update/{idUsuario}', [ContactoController::class, 'update']);
Route::delete('/usuario/delete/{idUsuario}', [ContactoController::class, 'destroy']);
