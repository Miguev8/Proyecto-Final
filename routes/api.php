<?php

use App\Http\Controllers\Api\RetoApiController;
use Illuminate\Support\Facades\Route;

Route::get('/retos', [RetoApiController::class, 'index']);
Route::post('/retos', [RetoApiController::class, 'store']);
Route::get('/retos/{id}', [RetoApiController::class, 'show']);
Route::put('/retos/{id}', [RetoApiController::class, 'update']);
Route::patch('/retos/{id}', [RetoApiController::class, 'update']);
Route::delete('/retos/{id}', [RetoApiController::class, 'destroy']);