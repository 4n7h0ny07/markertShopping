<?php

use App\Http\Controllers\importController;
use App\Http\Controllers\transaccionsController;
use App\Http\Controllers\ComprasController;
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



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    //imports routes

    Route::resource('import', importController::class);
    route::resource('requerimientos/compras', ComprasController::class);
    Route::get('requerimientos/compras/list/ajax/{search}',[ComprasController::class, 'list']);
   // Route::get('personas/list/ajax/{search?}', [PersonasController::class, 'list']);

    Route::get('transaccions', [transaccionsController::class, 'index'])->name('transaccions.index');
    
});

//Route::get('servers/{server}/test', [ServersController::class, 'test'])->name('servers.test');
//Route::get('sender', [SenderController::class, 'index'])->name('sender.index');

//Route::get('')->name('servers.mails');