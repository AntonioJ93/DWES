<?php

namespace Database\Seeders;

use App\Models\Articulo;
use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**   php artisan migrate:fresh --seed
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        /**
         *php artisan db:seed
         */

        //llamamos al factory de articulo
        Proveedor::factory(5)->create();
        Articulo::factory(50)->create();//llama al factory 50 veces
        
        //si queremos poblar desde el seeder, llamamos al seeder correspondiente
        //$this->call(ArticuloSeeder::class);
    }
}
