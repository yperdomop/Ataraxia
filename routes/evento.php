<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fintech\HomeController;
use App\Http\Controllers\evento\EventoController;


Route::get('/', [EventoController::class, 'index'])->name('evento.index');
Route::get('gestion', [EventoController::class, 'gestion'])->name('evento.gestion');
Route::get('lista', [EventoController::class, 'lista'])->name('evento.lista');
Route::delete('lista/{evento}', [EventoController::class, 'eliminar'])->name('evento.eliminar');
Route::get('ver-eventos', [EventoController::class, 'verEventos'])->name('evento.ver');
Route::get('seleccion', [EventoController::class, 'seleccion'])->name('evento.seleccion');
Route::post('gestion', [EventoController::class, 'guardar'])->name('evento.guardar');
Route::get('cotizacion/{evento}', [EventoController::class, 'cotizacion'])->name('evento.cotizacion');
Route::get('comparar-cotizaciones', [EventoController::class, 'comparar'])->name('evento.comparar');
Route::get('pago', [EventoController::class, 'pago'])->name('evento.pago');
Route::get('openpay', [EventoController::class, 'openpay'])->name('evento.openpay');
Route::get('pse', [EventoController::class, 'pse'])->name('evento.pse');
Route::get('pdf/{cotizacion}', [EventoController::class, 'pdf'])->name('evento.pdf');
