<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pacienteController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\EntrevistaController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\NotaEvolutivaController;
use App\Http\Controllers\PDFController;
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

//Route::resource('/','Controller');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/pacientes', pacienteController::class);
Route::resource('/citas', CitasController::class);
Route::resource('/entrevistas', EntrevistaController::class);
Route::resource('/recetas', RecetaController::class);
Route::resource('/notasEvolutivas', NotaEvolutivaController::class);
Route::get('/generarPdf/{id}', [PDFController::class, 'generarPDF'])->name('generarPdf');