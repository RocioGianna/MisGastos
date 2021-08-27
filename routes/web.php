<?php

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
 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('pagos.index');

Route::get('/pagos/create', [App\Http\Controllers\PagoController::class, 'create'])->name('pagos.create');

Route::post('/pagos/store', [App\Http\Controllers\PagoController::class, 'store'])->name('pagos.store');

Route::get('/pagos/{id}/edit', [App\Http\Controllers\PagoController::class, 'edit'])->name('pagos.edit');

Route::put('/pagos/{id}', [App\Http\Controllers\PagoController::class, 'update'])->name('pagos.update');

Route::delete('/pagos/{id}', [App\Http\Controllers\PagoController::class, 'destroy'])->name('pagos.delete');

Route::put('/pagos/{id}/editEstado', [App\Http\Controllers\PagoController::class,'updateEstado'])->name('pagos.estado');

Auth::routes();


