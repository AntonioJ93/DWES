<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProveedorController;
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
Route::controller(MainController::class)->group(function(){
    Route::get('/', 'index')->name("index");//se le asigna un nombre a las rutas
    Route::get('/contacto', 'contacto')->name("contacto");
    Route::post('/contacto/enviar', 'enviar')->name("enviar");
});
Route::controller(ArticuloController::class)->group(function () {
    Route::get('/articulos/home', 'index')->name("articulo.home");
    Route::get('/articulos/form', 'create')->name("articulo.create");
    Route::get('/articulos/{articulo}', 'show')->name("articulo.show");
    Route::post('/articulos', 'store')->name("articulo.store");
    Route::get('/articulos/buscar/item', 'buscar')->name("articulo.buscar");
    Route::get('/articulos/{articulo}/editar', 'edit')->name("articulo.edit");
    Route::put('/articulos/{articulo}', 'update')->name("articulo.update");
    Route::delete('/articulos/{articulo}', 'destroy')->name("articulo.destroy");
});
Route::controller(ProveedorController::class)->group(function () {
    Route::get('/proveedores', 'index')->name("proveedor.home");
    Route::get('/proveedores/create', 'create')->name("proveedor.create");
    Route::get('/proveedores/{proveedor}', 'show')->name("proveedor.show");
    Route::post('/proveedores', 'store')->name("proveedor.store");
    Route::get('/proveedores/buscar/item', 'buscar')->name("proveedor.buscar");
    Route::get('/proveedores/{proveedor}/edit', 'edit')->name("proveedor.edit");
    Route::put('/proveedores/{proveedor}', 'update')->name("proveedor.update");
    Route::delete('/proveedores/{proveedor}', 'destroy')->name("proveedor.destroy");
});

/**
 * https://www.youtube.com/watch?v=8EuErRfP4s4&list=PLZ2ovOgdI-kWWS9aq8mfUDkJRfYib-SvF&index=29
 */