<?php

use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\cashier\order\OrderController;
use App\Http\Controllers\ticket\ticket\TicketController;
use App\Http\Controllers\visor\VisorTable;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


//para imprimir ticket a cocina y comanda
Route::get('/generar-pdf/{id}', [TicketController::class, 'generatePdf'])->name('pdf.generate');
Route::get('/generar-pdf/comanda/{id}', [TicketController::class, 'generatePdfComanda'])->name('pdf.generate.comanda');


//rutas de los visores por piso
Route::get('/visor/tables', [VisorTable::class , 'index'])->name('visor.table.index');

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login', [LoginController::class, 'store'])->name('admin.login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//RUTAS PARA LA CAJERA 
require base_path('routes/cashier.php');

//RUTAS DEL ADMIN
require base_path('routes/admin.php');

//RUTAS DE LA MESERA
require base_path('routes/waitress.php');
