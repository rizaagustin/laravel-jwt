<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customer/import',[CustomerController::class,'import'])->name('customer.import');
Route::get('/', function () {
    return view('welcome');
});
