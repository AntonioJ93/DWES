<?php

namespace Database\Factories;

use App\Models\Articulo;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{

    //modelo que corresponde a la factory
    protected $model=Articulo::class;

    /**
     * php artisan make:factory ArticuloFactory
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre=$this->faker->sentence();
        $proveedores=Proveedor::class::pluck("id")->toArray();
        return [//atributos del modelo/tabla       
            "nombre" =>$nombre,
            "precio" =>$this->faker->randomFloat(2,0.5,100),
            "descripcion"=>$this->faker->paragraph(),
            "proveedor_id"=>$this->faker->randomElement($proveedores),//fk 
            "slug"=>Str::slug($nombre,"-")//slug para la url
        ];
    }
}
