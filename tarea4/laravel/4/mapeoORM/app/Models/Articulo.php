<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Articulo extends Model
{// php artisan make:model Articulo
    use HasFactory;
    use SoftDeletes;// hace que delete() haga un soft delete
    
    protected $table="articulo";//tabla de la bbdd a mapear
    //protected $primaryKey="nombre de la columna pk"  la columna pk no se llama id

    //campos habilitados para la asignación masiva
    protected $fillable=["nombre","precio","descripcion","slug","proveedor_id"];

    //campos deshabilitados para la asignación masiva
    //protected $guarded=["enable"];


    //accesores y mutadores en php 8
    protected function nombre():Attribute{
        return new Attribute(
            get: function($valor){
                return ucwords($valor);//capitaliza y despues lo muestra
            },
            set: function($valor){
                return strtolower($valor);//a minusculas y despues lo almacena en bbdd
            }
        );

        /**
         * lo mismo con funciones flecha
         * 
         *  return new Attribute(
         *   get: fn($valor)=>ucwords($valor),
         *   set: fn($valor)=>strtolower($valor)
         *   );
         */
       
    }
     /* antes de php 8
    public function getNombreAttribute($valor){
        return ucwords($valor);
    }

    public function setNombreAttribute($valor){
        $this->attributes["nombre"]=strtolower($valor);
    }
*/

    protected function updatedAt():Attribute{
        return new Attribute(
            get: function($valor){
                return date('d-m-Y G:i:s', strtotime($valor));//cambiar formato de hora
            }
        );
       
    }

    public function getRouteKeyName()
    {
        return "slug";//sustituir id de la ruta por slug
    }

    //manyToOne
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
   
}
