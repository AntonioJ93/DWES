<?php

use App\Http\Controllers\Ejemplo3Controller;
use App\Http\Controllers\EjemploController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginasController;
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
    Route::get("/foro","foro");
    Route::get('/post/{id}/{nombre?}',"update")->where("id","[0-9]+")->where("nombre","[a-zA-Z]*");
});

Route::controller(EjemploController::class)->group(function(){
    Route::get("/inicio","inicio");
});

Route::controller(Ejemplo3Controller::class)->group(function(){
    Route::get('/index',"index");
    Route::get('/create',"create");
    Route::get('/store',"store");
    Route::get("/show/{id}","show")->where("id","[0-9]+");
    Route::get("/edit/{id}","edit")->where("id","[0-9]+");
    Route::get("/update/{id}","update")->where("id","[0-9]+");
    Route::get("/destroy/{id}","destroy")->where("id","[0-9]+");
});

Route::controller(PaginasController::class)->group(function(){
    Route::get('/paginas',"inicio");
    Route::get('/paginas/inicio',"inicio");
    Route::get('/paginas/quienesSomos',"quienesSomos");
    Route::get('/paginas/dondeEstamos',"dondeEstamos");
    Route::get("/paginas/foro","foro");
});

// crea las rutas para el controlador creado automaticamente con php make:artisan --resource <NombreControlador>
Route::resource("crud",Ejemplo3Controller::class);

/**
 * /, /sobrenosotros, /contacto, /foro y /post/{id}/{nombre}.
 * Continuar curso: https://www.youtube.com/watch?v=KZGHCSIb9Q0&list=PLZ2ovOgdI-kWWS9aq8mfUDkJRfYib-SvF&index=6
 */
