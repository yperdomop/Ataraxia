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

Route::middleware(['auth:sanctum', 'web', 'role'])->get('/', [RegisterController::class, 'membership'])->name('ecommerce.membership');
Route::middleware(['auth:sanctum', 'verified'])->get('completar-registro/{membership}', [RegisterController::class, 'register'])->name('ecommerce.register');
Route::middleware(['auth:sanctum', 'verified'])->post('resumen-membresia', [RegisterController::class, 'summary'])->name('ecommerce.register.summary');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});