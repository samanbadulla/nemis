<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\InstitutionController;
use App\Http\Controllers\API\AuthenticationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/institutions', [InstitutionController::class, 'institutionList']);
Route::post('/login', [AuthenticationController::class, 'login']);
