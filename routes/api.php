<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/listarBiblioteca', [App\Http\Controllers\BibliotecaController::class, 'index'])->name('listarBiblioteca');  
Route::get('/listarLibros', [App\Http\Controllers\LibrosController::class, 'index'])->name('listarLibros'); 
Route::post('/storeLibros', [App\Http\Controllers\LibrosController::class, 'store'])->name('storeLibros');
Route::get('/libro/{id}', [App\Http\Controllers\LibrosController::class, 'libro'])->name('libro');   
Route::post('/deleteLibros', [App\Http\Controllers\LibrosController::class, 'destroy'])->name('deleteLibros');
Route::post('/updLibros', [App\Http\Controllers\LibrosController::class, 'update'])->name('updLibros'); 




