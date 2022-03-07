<?php

use App\Http\Controllers\MiControlador;
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

Route::get('/', function () {
    return view('welcome');
});
Route::controller(MiControlador::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/index', 'index');
    Route::get('/create', 'create');
    Route::get('/show/{id}', 'show');
    Route::get('/store/{id}', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::get('/update/{id}', 'update');
    Route::get('/destroy/{id}', 'destroy');
    Route::get('/plantilla1','plantilla1');
    Route::get('/plantilla2','plantilla2');
    Route::get('/plantilla3','plantilla3');
    Route::get('/alumnos','alumnos');
});


