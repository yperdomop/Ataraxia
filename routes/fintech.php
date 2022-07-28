<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fintech\HomeController;
use App\Http\Controllers\Fintech\EventoController;



Route::get('/', [HomeController::class, 'index'])->name('fintech.index');
Route::get('evento', [EventoController::class, 'index'])->name('fintech.evento');
Route::get('gestion', [EventoController::class, 'gestion'])->name('fintech.evento.gestion');
Route::get('cotizacion', [EventoController::class, 'cotizacion'])->name('fintech.evento.cotizacion');
Route::post('cotizacion', [EventoController::class, 'guardar'])->name('fintech.evento.guardar');
Route::get('pago', [EventoController::class, 'pago'])->name('fintech.evento.pago');
