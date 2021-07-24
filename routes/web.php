<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Livewire\Tasks;

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

Route::get('/', function () {
    return view('welcome');
});

/** Rutas de los desafios 1 y 3*/
Route::get('getInvoiceTotal/{invoiceId}', [InvoiceController::class, 'getTotal']);
Route::get('getInvoiceId', [InvoiceController::class, 'getInvoice']);
Route::get('getProductName', [InvoiceController::class, 'getExpensivesProducts']);

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', Tasks::Class)->name('dashboard');
});
