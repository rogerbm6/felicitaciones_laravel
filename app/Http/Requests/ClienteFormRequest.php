<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return
        [
          'nombre'            => 'required|max:45',
          'imagen'            => 'image|mimes:jpeg,png,jpg,gif|max:2048',
          'fecha_nacimiento'  => 'required|date',
          'correo'            => 'email| required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return
        [
            'required'        => 'Es necesario rellenar el campo :attribute',
            'nombre.max'      => 'El campo :attribute tiene como maximo :max caracteres',
            'imagen.mimes'    => 'El campo :attribute solo puede ser de tipos jpeg,png,jpg,gif',
            'imagen.image'    => 'El campo :attribute solo puede ser una imagen :mimes',
            'imagen.max'      => 'El campo :attribute solo puede ser una imagen de :max',
            'date'            => 'Es necesario rellenar el campo :attribute con una fecha',
            'correo.email'    => 'Es necesario rellenar el campo :attribute con un email valido',
        ];
    }
}
