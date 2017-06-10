<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        return [
        
            'nombre'     => 'required',
            'apellidos'  => 'required',
            'email'      => 'required|email',
            'depto'      => 'required',
            'usuario'    => 'required',
            'tipo'       => 'required',
            'password'   => 'required'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return[
            'nombre'    => 'Nombres',
            'apellidos' => 'Apellidos',
            'email'     => 'Correo',
            'depto'     => 'Departamento',
            'usuario'   => 'Usuario',
            'tipo'      => 'Tipo',
            'password'  => 'Contraseña'
        ];
    }
}
