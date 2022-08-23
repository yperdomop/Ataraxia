<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fintech\HomeController;



Route::get('/', [HomeController::class, 'index'])->name('fintech.index');
