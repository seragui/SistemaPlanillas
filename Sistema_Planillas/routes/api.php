<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesionController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\EstadoCivilController;
use App\Models\EstadoCivil;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/profesiones', ProfesionController::class);
Route::get('/profesiones/{profesion}', 'ProfesionController@show');
Route::put('/profesiones/{profesion}', 'ProfesionController@update');
Route::post('/tipo_documentos', [TipoDocumentoController::class,'store']);
Route::get('/tipo_documentos', [TipoDocumentoController::class,'index']);

//Rutas para estado civil
Route::get('/estados_civiles', [EstadoCivilController::class, 'index']);
Route::get('/estados_civiles/{estadoCivil}', [EstadoCivilController::class, 'show']);
Route::post('/estados_civiles', [EstadoCivilController::class, 'store']);
Route::put('/estados_civiles/{id}', [EstadoCivilController::class, 'update']);
Route::patch('/estados_civiles/{id}', [EstadoCivilController::class, 'update']);
Route::delete('/estados_civiles/{id}', [EstadoCivilController::class, 'destroy']);

