<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{// php artisan make:model Articulo
    use HasFactory;

    protected $table="articulo";//tabla de la bbdd a mapear
}
