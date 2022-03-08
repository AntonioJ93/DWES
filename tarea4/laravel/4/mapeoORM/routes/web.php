<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Routing\RouteGroup;
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


Route::controller(ArticuloController::class)->group(function () {
    Route::get('/', 'index')->name("index");//se le asigna un nombre a las rutas
    Route::get('/index', 'index')->name("index");
    Route::get('/articulo-form', 'create')->name("articulo.form");
    Route::get('/articulo/{id}', 'detalle')->name("articulo.detalle");
    Route::post('/articulo', 'store')->name("articulo.store");
    Route::get('/articulo/buscar/param', 'buscar')->name("articulo.buscar");
});
