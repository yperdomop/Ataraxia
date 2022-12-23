<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AhorroController;
use App\Http\Controllers\Admin\CreditoController;
use App\Http\Controllers\Admin\MicrocreditoController;
use App\Http\Controllers\Admin\InversionController;
use App\Http\Controllers\Admin\InversionCryptoController;
use App\Http\Controllers\Admin\OrganizarEventoController;
use App\Http\Controllers\Admin\AsistirEventoController;
use App\Http\Controllers\Admin\BecasController;
use App\Http\Controllers\Admin\EdutechController;
use App\Http\Controllers\Admin\MallController;
use App\Http\Controllers\Admin\PermisoController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DepartmentsController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\MembershipController;

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

Route::resource('ahorros', AhorroController::class)->middleware('can:ahorros')->except('show')->names('admin.ahorros');

Route::resource('creditos', CreditoController::class)->middleware('can:creditos')->except('show')->names('admin.creditos');

Route::resource('microcreditos', MicrocreditoController::class)->middleware('can:microcreditos')->except('show')->names('admin.microcreditos');

Route::resource('inversiones ', InversionController::class)->middleware('can:inversiones')->except('show')->names('admin.inversiones');

Route::resource('inversionescripto', InversionCryptoController::class)->middleware('can:inversionescripto')->except('show')->names('admin.inversionescripto');

Route::resource('organizarevento', OrganizarEventoController::class)->middleware('can:organizarevento')->except('show')->names('admin.organizarevento');

Route::resource('asistireventos', AsistirEventoController::class)->middleware('can:asistirevento')->except('show')->names('admin.asistirevento');

Route::resource('becas', BecasController::class)->middleware('can:becas')->except('show')->names('admin.becas');

Route::resource('edutech', EdutechController::class)->middleware('can:edutech')->except('show')->names('admin.edutech');

Route::resource('mall', MallController::class)->middleware('can:mall')->except('show')->names('admin.mall');

Route::resource('permisos', PermisoController::class)->except('show')->names('admin.permisos');

Route::resource('compania', CompanyController::class)->except('show')->names('admin.compania');

Route::resource('countries', LocationController::class)->names('admin.localizaciones');
Route::resource('countries.departments', DepartmentsController::class)->except('index')->names('admin.departamentos');
Route::resource('departments.cities', CitiesController::class)->except('index', 'show')->names('admin.ciudades');

Route::resource('documents', DocumentController::class)->names('admin.documentos');

Route::resource('memberships', MembershipController::class)->names('admin.memberships');
