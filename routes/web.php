<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ecommerce\RegisterController;
use App\mail\ConfirmacionMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\HomeController;
use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiRequestError;


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

Route::get('validar', function () {
    if (Auth::user()->can('admin')) {
        return redirect()->route('admin.index');
    } elseif (Auth::user()->hasRole('proveedor')) {
        return redirect()->route('ecommerce.membership');
    } else {
        return redirect()->route('dashboard');
    }
});

Route::get('membresias', [RegisterController::class, 'membership'])->name('ecommerce.membership');
Route::get('/', function () {
    return redirect()->route('ecommerce.membership');
});
Route::get('membresias', [RegisterController::class, 'membership'])->name('ecommerce.membership');
Route::get('completar-registro/{membership}', [RegisterController::class, 'register'])->name('ecommerce.register');
Route::post('completar-registro/{membership}', [RegisterController::class, 'storage'])->name('ecommerce.storage');
Route::get('modificar-pedido/{company}', [RegisterController::class, 'edit'])->name('ecommerce.edit');
Route::post('modificar-pedido/{company}', [RegisterController::class, 'update'])->name('ecommerce.update');
Route::get('resumen-membresia/{company}', [RegisterController::class, 'summary'])->name('ecommerce.summary');
Route::get('pasarela-pagos/{company}', [RegisterController::class, 'payment'])->name('ecommerce.payment');
Route::get('openpay/{company}', [RegisterController::class, 'openpay'])->name('ecommerce.openpay');
Route::get('registro-proveedores', [RegisterController::class, 'supplier'])->name('ecommerce.supplier');
Route::post('registro-proveedores', [RegisterController::class, 'storageSupplier'])->name('ecommerce.supplier.storage');

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

//correo
Route::get('confirmacion', function () {
    $correo = new ConfirmacionMailable;
    Mail::to('yadirperdomo0509@gmail.com')->send($correo);
    return "Hemos enviado un mensaje a tu correo electrónico";
});

//openpay
Route::get('openpay', function () {
    try {
        $openpay = Openpay::getInstance(env('OPENPAY_ID'), env('OPENPAY_SK'), 'CO');
        $customerData = array(
            'name' => 'Jadir',
            'last_name' => 'Perdomo',
            'email' => 'teofilo@payments.com',
            'phone_number' => '4421112233',
        );
        $findDataRequest = array(
            'creation[gte]' => '2022-01-01',
            'creation[lte]' => '2022-12-31',
            'offset' => 0,
            'limit' => 5
        );
        $client = $openpay->customers->get('a4npsfmrjtkfvdvhx1aj');
        $client->delete();
        return response()->json($client,);
    } catch (OpenpayApiRequestError $e) {
        return ('ERROR on the request: ' . $e->getMessage());
    }
});
