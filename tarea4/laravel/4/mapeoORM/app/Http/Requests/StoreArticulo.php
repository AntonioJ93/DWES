<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticulo extends FormRequest
{
    /** php artisan make:request StoreArticulo
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   //permisos 
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   //validaciones
        return [
            "nombre" => "required",
            "precio" => ["required", "gt:0", "lte:99999999"],
            "descripcion" => "required"
        ];
    }

    //personalizar nombres de campos para los mensajes
    public function attributes()
    {
        return [
            "nombre" => "nombre del Articulo"
        ];
    }

    //personalizar mensajes
    public function messages()
    {
        return [
            "descripcion.required"=>"Debe rellenar la descripción"
        ];
    }
}
