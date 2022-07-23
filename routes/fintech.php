<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fintech\HomeController;
use App\Http\Controllers\Fintech\EventoController;
use App\Http\Controllers\Fintech\GestionController;
use App\Http\Controllers\Fintech\CotizacionController;


Route::get('/', [HomeController::class, 'index'])->name('fintech.index');
Route::get('evento', [EventoController::class, 'index'])->name('fintech.evento');
Route::get('gestion', [GestionController::class, 'index'])->name('fintech.evento.gestion');
Route::get('cotizacion', [CotizacionController::class, 'index'])->name('fintech.evento.cotizacion');
