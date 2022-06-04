<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

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

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.index');

Route::resource('users', UserController::class)->except('show')->names('admin.users');

Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');

/* Route::resource('ahorros', RoleController::class)->except('show')->names('admin.roles');

Route::resource('créditos', RoleController::class)->except('show')->names('admin.roles');

Route::resource('microcréditos', RoleController::class)->except('show')->names('admin.roles');

Route::resource('inversiones ', RoleController::class)->except('show')->names('admin.roles');

Route::resource('inversionescripto', RoleController::class)->except('show')->names('admin.roles');

Route::resource('organizarevento', RoleController::class)->except('show')->names('admin.roles');

Route::resource('asistiraeventos', RoleController::class)->except('show')->names('admin.roles');

Route::resource('becas', RoleController::class)->except('show')->names('admin.roles');

Route::resource('edutechs', RoleController::class)->except('show')->names('admin.roles');

Route::resource('malls', RoleController::class)->except('show')->names('admin.roles');

 */