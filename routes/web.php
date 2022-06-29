<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ecommerce\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RegisterController::class, 'membership'])->name('ecommerce.membership');
Route::get('completar-registro/{membership}', [RegisterController::class, 'register'])->name('ecommerce.register');
Route::post('completar-registro/{membership}', [RegisterController::class, 'storage'])->name('ecommerce.storage');
Route::get('resumen-membresia/{company}', [RegisterController::class, 'summary'])->name('ecommerce.summary');
Route::get('pasarela-pagos', [RegisterController::class, 'payment'])->name('ecommerce.payment');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
