<?php

use App\Http\Controllers\Supplier\QuotationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

//proveedor
Route::controller(SupplierController::class)->group(function () {
    Route::get('', 'index')->name('supplier.index');
    Route::get('evento', 'evento')->name('supplier.evento');
});

Route::resource('event.quotations', QuotationController::class)->names('supplier.cotizaciones');
