<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HojaVidaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PoblacionController;
use App\Http\Controllers\SeguridadSocialController;
use App\Http\Controllers\TerceroController;
use App\Http\Controllers\VehiculoController;
use App\Models\HojaVida;
use App\Models\Poblacion;
use App\Models\SeguridadSocial;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/index', function(){return view('index');})->middleware('auth')->name('index');

//Route::resource('empresas', EmpresaController::class)->middleware('auth');

Route::get('/administracion/mi-empresa', [EmpresaController::class, 'show'])->middleware('auth')->name('empresa.show');
Route::get('/administracion/mi-empresa/edit', [EmpresaController::class, 'edit'])->middleware('auth')->name('empresa.edit');
Route::put('/administracion/mi-empresa',  [EmpresaController::class, 'update'])->middleware('auth')->name('empresa.update');

Route::resource('/administracion/terceros', TerceroController::class)->middleware('auth');
Route::resource('/administracion/hojaVidas', HojaVidaController::class)->middleware('auth');
Route::post('/administracion/seguridadSocialModal', [SeguridadSocialController::class, 'store'])->name('seguridadSocialModal.store');
Route::resource('/administracion/poblaciones', PoblacionController::class)->middleware('auth')->parameters([
    'poblaciones' => 'poblacion'
]);
Route::resource('/prestacion-servicio/vehiculos', VehiculoController::class)->middleware('auth');