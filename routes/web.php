<?php

use App\Http\Controllers\importController;
use App\Http\Controllers\transaccionsController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ActivosController;
use App\Http\Controllers\PlanpagosController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('login', function () {
    return redirect('admin/login');
})->name('login');

Route::get('/', function () {
    return redirect('admin');
    // $template = '.default';
    // return view("shop$template.index", compact('template'));
});

Route::group(['prefix' => 'admin', 'middleware' => 'loghttp'], function () {
    Voyager::routes();

    //imports routes

    Route::resource('import', importController::class);

 ///requerimientos compras
    Route::resource('requerimientos/compras', ComprasController::class);
    Route::get('requerimientos/compras/list/ajax/{search?}',[ComprasController::class, 'list']);
    Route::get('requerimientos/compras/{id}',[ComprasController::class, 'show'])->name('voyager.requerimientos.compras');
    Route::get('requerimientos/compras/{id}/print', [ComprasController::class, 'print'])->name('compras.print');

///requerimientos activos
    Route::resource('requerimientos/activos', ActivosController::class);
    Route::get('requerimientos/activos/list/ajax/{search?}',[ActivosController::class, 'list']);
    Route::get('requerimientos/activos/{id}',[ActivosController::class, 'show'])->name('voyager.requerimientos.activos');
    Route::get('requerimientos/activos/{id}/print', [ActivosController::class, 'print'])->name('activos.print');
    Route::put('requerimientos/activos/{id}/death',[ActivosController::class, 'death'])->name('activos.death');
    Route::delete('requerimientos/activos/delete/{id}',[ActivosController::class, 'delete']);
    
//plan de pagos para ventas al creditos
    Route::resource('plan', PlanpagosController::class);
    Route::get('plan/list/ajax/{search}', [PlanpagosController::class, 'list']);
    Route::post('plan/{id}', [PlanpagosController::class, 'show'])->name('voyager.plan');

// sales for clientes
    Route::resource('sales', SalesController::class);
    Route::post('sales/create', [SalesController::class, 'create'])->name('sales.create');

//rutes mailers

    Route::resource('mails', MailController::class);

/// transacciones de la app
    Route::get('transaccions', [transaccionsController::class, 'index'])->name('transaccions.index');
    

});

//Route::get('servers/{server}/test', [ServersController::class, 'test'])->name('servers.test');
//Route::get('sender', [SenderController::class, 'index'])->name('sender.index');

//Route::get('')->name('servers.mails');