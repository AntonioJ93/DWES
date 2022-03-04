<?php

use App\Http\Controllers\HomeController;
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

//"nombre del controlador"@"nombre del metodo"          laravel 7
//array [nombre del controlador,"nombre del metodo"]    laravel 8 en adelante
/*Route::get('/', [HomeController::class,"index"]);
Route::get('/sobrenosotros', [HomeController::class,"sobreNosotros"]);
Route::get('/contacto', [HomeController::class,"contacto"]);
Route::get('/post/{id}/{nombre?}', [HomeController::class,"update"]);*/



//definiendo el grupo de rutas de un controlador        laravel 9
Route::controller(HomeController::class)->group(function(){
    Route::get('/',"index");
    Route::get('/sobrenosotros',"sobreNosotros");
    Route::get('/contacto',"contacto");
    Route::get('/post/{id}/{nombre?}',"update");
});

/**
 * Continuar curso: https://www.youtube.com/watch?v=KZGHCSIb9Q0&list=PLZ2ovOgdI-kWWS9aq8mfUDkJRfYib-SvF&index=6
 */
