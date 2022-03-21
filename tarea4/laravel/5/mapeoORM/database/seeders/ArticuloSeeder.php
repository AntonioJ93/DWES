<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * php artisan make:seeder ArticuloSeeder
     * php artisan db:seed
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       /* se hace con el factory
        $articulo1= new Articulo();
        $articulo1->nombre="lapiz";
        $articulo1->precio=0.2;
        $articulo1->descripcion="lapiz de dureza media";
        $articulo1->save();

        $articulo2= new Articulo();
        $articulo2->nombre="boligrafo";
        $articulo2->precio=0.5;
        $articulo2->descripcion="boli azul";
        $articulo2->save();

        $articulo3= new Articulo();
        $articulo3->nombre="goma";
        $articulo3->precio=0.15;
        $articulo3->descripcion="goma Milan";
        $articulo3->save();
        */
    }
}
