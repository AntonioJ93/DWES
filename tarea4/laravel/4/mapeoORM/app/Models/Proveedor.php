<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory;
    use SoftDeletes;// hace que delete() haga un soft delete

    protected $table="proveedor";//tabla de la bbdd a mapear


    protected function nombre():Attribute{
        return new Attribute(
            get: function($valor){
                return ucwords($valor);//capitaliza y despues lo muestra
            },
            set: function($valor){
                return strtolower($valor);//a minusculas y despues lo almacena en bbdd
            }
        );
    }

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
    public function articulos(){
        return $this->hasMany(Articulo::class);
    }
}
