<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesionController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\OrganizacionController;
use App\Http\Controllers\UnidadOrganizativaController;
use App\Http\Controllers\PresupuestoController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
    Route::post('/password_reset', [AuthController::class, 'resetPassword'])->middleware('auth:api')->name('password.reset');
});

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

//Rutas para pais
Route::get('/pais', [PaisController::class, 'index']);
Route::get('/pais/{pais}', [PaisController::class, 'show']);
Route::post('/pais', [PaisController::class, 'store']);
Route::put('/pais/{id}', [PaisController::class, 'update']);
Route::patch('/pais/{id}', [PaisController::class, 'update']);
Route::delete('/pais/{id}', [PaisController::class, 'destroy']);

//Rutas para departamento
Route::get('/departamento', [DepartamentoController::class, 'index']);
Route::get('/departamento/{departamento}', [DepartamentoController::class, 'show']);
Route::post('/departamento', [DepartamentoController::class, 'store']);
Route::put('/departamento/{id}', [DepartamentoController::class, 'update']);
Route::patch('/departamento/{id}', [DepartamentoController::class, 'update']);
Route::delete('/departamento/{id}', [DepartamentoController::class, 'destroy']);

//Rutas para departamento
Route::get('/municipio', [MunicipioController::class, 'index']);
Route::get('/municipio/{municipio}', [MunicipioController::class, 'show']);
Route::post('/municipio', [MunicipioController::class, 'store']);
Route::put('/municipio/{id}', [MunicipioController::class, 'update']);
Route::patch('/municipio/{id}', [MunicipioController::class, 'update']);
Route::delete('/municipio/{id}', [MunicipioController::class, 'destroy']);

//Rutas para cargos
Route::get('/cargo', [CargoController::class, 'index']);
Route::get('/cargo/{cargo}', [CargoController::class, 'show']);
Route::post('/cargo', [CargoController::class, 'store']);
Route::put('/cargo/{id}', [CargoController::class, 'update']);
Route::patch('/cargo/{id}', [CargoController::class, 'update']);
Route::delete('/cargo/{id}', [CargoController::class, 'destroy']);


//Rutas para cargos
Route::get('/cargo', [CargoController::class, 'index']);
Route::get('/cargo/{cargo}', [CargoController::class, 'show']);
Route::post('/cargo', [CargoController::class, 'store']);
Route::put('/cargo/{id}', [CargoController::class, 'update']);
Route::patch('/cargo/{id}', [CargoController::class, 'update']);
Route::delete('/cargo/{id}', [CargoController::class, 'destroy']);


//Rutas para organizacion
Route::get('/organizacion', [OrganizacionController::class, 'index']);
Route::get('/organizacion/{organizacion}', [OrganizacionController::class, 'show']);
Route::post('/organizacion', [OrganizacionController::class, 'store']);
Route::put('/organizacion/{id}', [OrganizacionController::class, 'update']);
Route::patch('/organizacion/{id}', [OrganizacionController::class, 'update']);
Route::delete('/organizacion/{id}', [OrganizacionController::class, 'destroy']);

//Rutas para organizacion
Route::get('/unidad', [UnidadOrganizativaController::class, 'index']);
Route::get('/unidad/{unidad}', [UnidadOrganizativaController::class, 'show']);
Route::post('/unidad', [UnidadOrganizativaController::class, 'store']);
Route::put('/unidad/{id}', [UnidadOrganizativaController::class, 'update']);
Route::patch('/unidad/{id}', [UnidadOrganizativaController::class, 'update']);
Route::delete('/unidad/{id}', [UnidadOrganizativaController::class, 'destroy']);

//Rutas para presupuesto
Route::get('/presupuesto_unidad', [PresupuestoController::class, 'index']);
Route::get('/presupuesto_unidad/{unidad}', [PresupuestoController::class, 'show']);
Route::post('/presupuesto_unidad', [PresupuestoController::class, 'store']);
Route::put('/presupuesto_unidad/{id}', [PresupuestoController::class, 'update']);
Route::patch('/presupuesto_unidad/{id}', [PresupuestoController::class, 'update']);
Route::delete('/presupuesto_unidad/{id}', [PresupuestoController::class, 'destroy']);