<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ecommerce\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Http;


Route::get('validar', function () {
    if (Auth::user()->can('admin.home')) {
        return redirect()->route('admin.index');
    } elseif (Auth::user()->hasRole('Proveedor')) {
        return redirect()->route('supplier.index');
    } else {
        return redirect()->route('dashboard');
    }
});

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('ecommerce.membership');
    }
});
Route::get('membresias', [RegisterController::class, 'membership'])->name('ecommerce.membership');
Route::get('completar-registro/{membership}', [RegisterController::class, 'register'])->name('ecommerce.register');
Route::post('completar-registro/{membership}', [RegisterController::class, 'storage'])->name('ecommerce.storage');
Route::get('modificar-pedido/{company}', [RegisterController::class, 'edit'])->name('ecommerce.edit');
Route::post('modificar-pedido/{company}', [RegisterController::class, 'update'])->name('ecommerce.update');
Route::get('resumen-membresia/{company}', [RegisterController::class, 'summary'])->name('ecommerce.summary');
Route::get('pasarela-pagos/{company}', [RegisterController::class, 'payment'])->name('ecommerce.payment');
Route::get('openpay/{company}', [RegisterController::class, 'openpay'])->name('ecommerce.openpay');
Route::get('pse/{company}', [RegisterController::class, 'pse'])->name('ecommerce.pse');
Route::get('confirmar-pse', [RegisterController::class, 'confirmar'])->name('ecommerce.confirmar');
Route::post('openpay/{company}', [RegisterController::class, 'enviarPago'])->name('ecommerce.pay');
Route::get('registro-proveedores', [RegisterController::class, 'supplier'])->name('ecommerce.supplier');
Route::post('registro-proveedores', [RegisterController::class, 'storageSupplier'])->name('ecommerce.supplier.storage');

/* Mapa de google lat, lng*/
Route::get('prueba', function () {
    $coordenadas = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=Estadio+El+Campin,Bogotá,Colombia&key=AIzaSyA3UCHzlYKgdfQ97DZ5S2xmoJ6FYc4A-a4');
    $coordenadas = json_decode($coordenadas);
    return $coordenadas->results[0]->geometry->location;
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/documentos', [HomeController::class, 'documentos'])->name('documentos');
    Route::post('/guardar-documentos', [HomeController::class, 'guardarDocumentos'])->name('documentos.guardar');
    Route::get('/ver-documentos', [HomeController::class, 'verDocumentos'])->name('documentos.ver');
    Route::delete('/documentos/{document}', [HomeController::class, 'EliminarDocumento'])->name('documentos.eliminar');
});
