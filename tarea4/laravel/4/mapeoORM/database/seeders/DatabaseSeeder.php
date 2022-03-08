<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
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
        Articulo::factory(50)->create();//llama al factory 50 veces

        //si queremos poblar desde el seeder, llamamos al seeder correspondiente
        //$this->call(ArticuloSeeder::class);
    }
}
