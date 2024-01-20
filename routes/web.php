<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Route::redirect('/', '/items');

    Route::get('items',[\App\Http\Controllers\ItemController::class,'index'])->name('items.index');
    Route::get('clients',[\App\Http\Controllers\ClientController::class,'index'])->name('clients.index');


// Show the form for creating a new invoice
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');

// Store a newly created invoice in the database
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
});
