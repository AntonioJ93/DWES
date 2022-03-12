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

/**
 * depurar
 */
Route::get('php/info', function () {
    phpinfo();
});

Route::controller(ArticuloController::class)->group(function () {
    Route::get('/', 'index')->name("index");//se le asigna un nombre a las rutas
    Route::get('/index', 'index')->name("index");
    Route::get('/articulos/form', 'create')->name("articulo.create");
    Route::get('/articulos/{articulo}', 'show')->name("articulo.show");
    Route::post('/articulos', 'store')->name("articulo.store");
    Route::get('/articulos/buscar/item', 'buscar')->name("articulo.buscar");
    Route::get('/articulos/{articulo}/editar', 'edit')->name("articulo.edit");
    Route::put('/articulos/{articulo}', 'update')->name("articulo.update");
    Route::delete('/articulos/{articulo}', 'destroy')->name("articulo.destroy");
});

/**
 * https://www.youtube.com/watch?v=oBxfBlV_2sU&list=PLZ2ovOgdI-kWWS9aq8mfUDkJRfYib-SvF&index=18
 */