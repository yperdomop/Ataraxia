<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fintech\HomeController;
use App\Http\Controllers\evento\EventoController;


Route::get('/', [EventoController::class, 'index'])->name('evento.index');
Route::get('gestion', [EventoController::class, 'gestion'])->name('evento.gestion');
Route::get('seleccion', [EventoController::class, 'seleccion'])->name('evento.seleccion');
Route::get('cotizacion', [EventoController::class, 'cotizacion'])->name('evento.cotizacion');
Route::post('cotizacion', [EventoController::class, 'guardar'])->name('evento.guardar');
Route::get('pago', [EventoController::class, 'pago'])->name('evento.pago');
